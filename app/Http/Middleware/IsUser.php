<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle($request, \Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['user', 'admin'])) {
            return $next($request);
        }

        abort(403);
    }
}
