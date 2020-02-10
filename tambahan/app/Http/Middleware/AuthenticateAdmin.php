<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin 
{

    public function handle($request, Closure $next)
    {

        if (session('accessId') != 'Admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
