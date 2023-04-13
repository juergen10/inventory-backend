<?php

namespace App\Exceptions;

use Exception;
use App\Http\Traits\Response;

class UnauthorizedException extends Exception
{
    use Response;

    public function render($request)
    {
        return $this->response('fail', null, $this->getMessage(), 401);
    }
}