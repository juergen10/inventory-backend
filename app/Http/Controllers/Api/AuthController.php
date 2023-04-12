<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('sp##d$erviceTok3n')->accessToken;
            return response()->json([
                'data' => [
                    'token' => $token
                ]
            ], 200);
        }

        return response()->json([
            'errors' => ['unknown_account']
        ], 400);

    }

    public function me()
    {
        return response()->json([
            'data' => auth()->user()
        ], 200);
    }
}