<?php

namespace App\Http\Middleware;

use App\Exceptions\UnauthorizedException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an unauthenticated user. render Error message when user uses invalid session
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \App\Exceptions\UnautorizedException
     */
    protected function unauthenticated($request, $guards)
    {
        throw new UnauthorizedException("unauthorized");
    }
}
