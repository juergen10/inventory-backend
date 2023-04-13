<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $limit = $request->input('limit', 10);

        $variants = Variant::select('uuid', 'name')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate($limit);

        return response()->json([
            'data' => $variants
        ], 200);
    }

    public function getByUuid(Request $request, string $uuid)
    {
        $variant = Variant::select('uuid', 'name')
            ->where('uuid', $uuid)->first();

        return response()->json([
            'data' => $variant
        ], 200);
    }
}