<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckSKURequest;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Traits\Response;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use App\Models\ProductVariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use Response;
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $limit = $request->input('perPage', 10);
        $order = $request->input('order', 'desc');

        $products = Product::with('variants', 'variants.images', 'variants.option')
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('id', $order)
            ->paginate($limit);

        return $this->response('success', $products);
    }

    public function getByUuid(string $uuid)
    {
        $product = Product::with('variants', 'variants.images', 'variants.option')
            ->where('uuid', $uuid)
            ->first();

        if (null == $product) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        return $this->response('success', $product);
    }

    public function uploadImage(ImageUploadRequest $request)
    {
        $extensionFile = $request->file('image')->getClientOriginalExtension();
        $filename = (string) Str::orderedUuid() . '-' . time() . '.' . $extensionFile;

        $saveFile = $request->file('image')->storeAs('images/products', $filename);

        $data = [
            'filename' => $filename,
            'url' => config('app.url') . '/' . $saveFile
        ];

        return $this->response('success', $data);
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

            $isPrimary = 1;
            foreach ($request->variants as $variant) {

                // 1. Insert product variant
                $productVariant = new ProductVariant;
                $productVariant->product_uuid = $product->uuid;
                $productVariant->variant_uuid = $variant['variant_uuid'];
                $productVariant->sku = $variant['sku'];
                $productVariant->weight = $variant['weight'];
                $productVariant->stock = $variant['stock'];
                $productVariant->price = $variant['price'];
                $productVariant->fund = $variant['fund'];
                $productVariant->save();

                // 2. Insert product variant option
                $productVariantOption = new ProductVariantOption;
                $productVariantOption->product_variant_uuid = $productVariant->uuid;
                $productVariantOption->option_uuid = $variant['option_uuid'];
                $productVariantOption->save();

                // 3. Insert product variant image
                foreach ($variant['images'] as $image) {
                    $productVariantImage = new ProductVariantImage;
                    $productVariantImage->product_variant_uuid = $productVariant->uuid;
                    $productVariantImage->name = $image;
                    $productVariantImage->is_primary = $isPrimary;
                    $productVariantImage->save();
                    $isPrimary = null;
                }
                $isPrimary = null;
            }

            DB::commit();
            $product = Product::with('variants', 'variants.images', 'variants.option')
                ->where('uuid', $product->uuid)
                ->first();

            return $this->response('success', $product);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->response('fail', null, $th->getMessage(), 400);
        }

    }

    public function checkSKU(CheckSKURequest $request)
    {
        $sku = ProductVariant::where('sku', $request->sku)->first();

        if (null == $sku) {
            return $this->response('success');
        }

        if ($request->product_uuid == $sku->product_uuid) {
            return $this->response('success');
        }

        return $this->response('fail', null, 'sku_exist', 400);
    }

    public function update(UpdateProductRequest $request, string $uuid)
    {

        DB::beginTransaction();
        try {
            $product = Product::where('uuid', $uuid)->first();

            if (null == $product) {
                return $this->response('fail', null, 'resource_not_found', 400);
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

            $productVariant = null;
            $productVariantImage = null;

            foreach ($request->variants as $variant) {
                // 1. update or create product variant
                if (isset($variant['uuid'])) {
                    $productVariant = ProductVariant::where('uuid', $variant['uuid'])->first();

                    if (null == $productVariant) {
                        continue;
                    }

                    $productVariant->variant_uuid = $variant['variant_uuid'];
                    $productVariant->sku = $variant['sku'];
                    $productVariant->weight = $variant['weight'];
                    $productVariant->stock = $variant['stock'];
                    $productVariant->price = $variant['price'];
                    $productVariant->fund = $variant['fund'];
                    $productVariant->save();

                } else {
                    $productVariant = new ProductVariant;
                    $productVariant->product_uuid = $product->uuid;
                    $productVariant->variant_uuid = $variant['variant_uuid'];
                    $productVariant->sku = $variant['sku'];
                    $productVariant->weight = $variant['weight'];
                    $productVariant->stock = $variant['stock'];
                    $productVariant->price = $variant['price'];
                    $productVariant->fund = $variant['fund'];
                    $productVariant->save();
                }
                // 2. update or create product variant option
                $productVariantOption = ProductVariantOption::where('product_variant_uuid', $productVariant->uuid)
                    ->where('option_uuid', $variant['option_uuid'])->first();

                if (null == $productVariantOption) {
                    $productVariantOption = new ProductVariantOption;
                    $productVariantOption->product_variant_uuid = $productVariant->uuid;
                    $productVariantOption->option_uuid = $variant['option_uuid'];
                    $productVariantOption->save();

                    ProductVariantOption::where('product_variant_uuid', $productVariant->uuid)
                        ->where('option_uuid', '!=', $variant['option_uuid'])->delete();
                }

                // 3. update or create image

                foreach ($variant['images'] as $image) {
                    $productVariantImage = ProductVariantImage::where('name', $image)->first();

                    if (null == $productVariantImage) {
                        $productVariantImage = new ProductVariantImage;
                        $productVariantImage->product_variant_uuid = $productVariant->uuid;
                        $productVariantImage->name = $image;
                        $productVariantImage->save();
                    } else {
                        continue;
                    }
                }
            }

            if ($request->has('deleted_variant')) {
                $deleteProductVariant = ProductVariant::whereIn('uuid', $request->deleted_variant)->delete();
            }

            if ($request->has('deleted_image')) {
                $deleteImage = ProductVariantImage::whereIn('name', $request->deleted_image)->delete();
            }

            DB::commit();

            $product = Product::with('variants', 'variants.images', 'variants.option')
                ->where('uuid', $uuid)
                ->first();

            return $this->response('success', $product);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->response('fail', null, $th->getMessage(), 400);
        }
    }

    public function removeVariant(string $uuid)
    {
        $productVariant = ProductVariant::where('uuid', $uuid)->first();

        if (null == $productVariant) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        $productVariant->delete();

        return $this->response('success', null, null, 204);
    }

    public function removeProduct(string $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        if (null == $product) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        $product->delete();

        return $this->response('success', null, null, 204);
    }
}