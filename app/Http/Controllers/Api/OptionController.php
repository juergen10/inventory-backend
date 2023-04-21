<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    use Response;
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $limit = $request->input('limit', 10);
        $order = $request->input('order', 'desc');

        $options = Option::select([
            'uuid',
            'name'
        ])->where('name', 'like', '%' . $search . '%')
            ->orderBy('id', $order)
            ->paginate($limit);

        return $this->response('success', $options);
    }

    public function getByUuid(Request $request, string $uuid)
    {
        $option = Option::select([
            'uuid',
            'name'
        ])->where('uuid', $uuid)->first();

        if (null == $option) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        return $this->response('success', $option);
    }
}