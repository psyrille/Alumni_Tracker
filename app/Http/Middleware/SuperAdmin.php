<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{

    public function handle(Request $request, Closure $next)
    {

        if (!auth()->check()){
            session(['autherror' => "Session expires."]);
            return redirect()->route("auth-login-admin-basic");
        }

        if (strtolower(auth()->user()->type) != 'admin'){
            session(['autherror' => "You are not permitted to view the page. Please re login."]);
            return redirect()->route("auth-login-admin-basic");
        }

        return $next($request);
    }
}
