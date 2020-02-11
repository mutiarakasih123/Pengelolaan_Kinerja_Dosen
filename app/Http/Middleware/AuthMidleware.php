<?php

namespace App\Http\Middleware;

use Closure;

class AuthMidleware 
{

    public function handle($request, Closure $next)
    {
        if(session("accessId") == null)
        {
                     return redirect("/login");
        }else{
            return $next($request);
        }
    }
}
