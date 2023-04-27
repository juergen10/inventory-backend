<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\ProductRequest;
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
            return $this->response('success', null, $th->getMessage(), 400);
        }

    }
}