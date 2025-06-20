<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next)
{
    if (Auth::check()) {
        \Log::info('User logged in', [
            'user_id' => Auth::id(),
            'ip' => $request->ip(),
            'agent' => $request->userAgent()
        ]);
    }
     return $next($request);
}
}