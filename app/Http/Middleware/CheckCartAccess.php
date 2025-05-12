<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCartAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/CheckCartAccess.php
public function handle($request, Closure $next)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to access your cart');
    }
    
    return $next($request);
}
}
