<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Traits\Response;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use Response;
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $limit = $request->input('limit', 10);
        $order = $request->input('order', 'desc');

        $customers = Customer::select([
            'uuid',
            'name',
            'phone_number',
            'email',
            'postal_code',
            'address'
        ])->where('name', 'like', '%' . $search . '%')
            ->orderBy('id', $order)
            ->paginate($limit);

        return $this->response('success', $customers);
    }

    public function getByUuid(Request $request, string $uuid)
    {
        $customer = Customer::select([
            'uuid',
            'name',
            'phone_number',
            'email',
            'postal_code',
            'address'
        ])->where('uuid', $uuid)
            ->first();

        if (null == $customer) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        return $this->response('success', $customer);
    }

    public function update(CustomerRequest $request, string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        if (null == $customer) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        $customer->name = $request->name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->postal_code = $request->postal_code;
        $customer->address = $request->address;
        $customer->save();

        return $this->response('success', $customer);
    }

    public function store(CustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'postal_code' => $request->postal_code,
            'address' => $request->address
        ]);

        return $this->response('success', $customer);
    }
    public function delete(string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        if (null == $customer) {
            return $this->response('fail', null, 'resource_not_found', 400);
        }

        $customer->delete();

        return $this->response('success', null, null, 204);
    }
}