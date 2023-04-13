<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Traits\Response;

class AuthController extends Controller
{
    use Response;
    public function login(AuthLoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('sp##d$erviceTok3n')->accessToken;

            return $this->response('success', $token);
        }

        return $this->response('fail', null, 'unknown_account', 400);

    }

    public function me()
    {
        return $this->response('success', auth()->user());
    }
}