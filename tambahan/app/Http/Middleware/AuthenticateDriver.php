<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateDriver 
{

    public function handle($request, Closure $next)
    {

        if (session('accessId') == 'User') {
            return redirect('/');
        }

        return $next($request);
    }
}
