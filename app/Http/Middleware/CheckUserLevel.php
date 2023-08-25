<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserLevel
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->user_level >= 1 and Auth::user()->user_level <= 4) {
            $request->merge(['role' => 'ADMIN']);
        } else if (Auth::user()->user_level >= 5 and Auth::user()->user_level <= 6) {
            $request->merge(['role' => 'USER']);
        }
        return $next($request);
    }
}
