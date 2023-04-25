<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Traits\Response;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
}