<?php

namespace App\Http\Traits;

trait Response
{
    public function response(string $status, $data = null, $message = null, $code = 200)
    {
        $response = [];
        $response['status'] = $status;

        if (null !== $message) {
            $response['message'] = $message;
        }

        if (null !== $data) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}