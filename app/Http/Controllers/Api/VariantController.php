<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    use Response;
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $limit = $request->input('limit', 10);

        $variants = Variant::select('uuid', 'name')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate($limit);

        return $this->response('success', $variants);
    }

    public function getByUuid(Request $request, string $uuid)
    {
        $variant = Variant::select('uuid', 'name')
            ->where('uuid', $uuid)->first();

        return $this->response('success', $variant);
    }
}