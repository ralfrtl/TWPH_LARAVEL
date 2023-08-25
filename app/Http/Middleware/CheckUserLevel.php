<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if ($request->user_level >= 1 and $request->user_level <= 4) {
            $request->merge(['role' => 'ADMIN']);
        } else if ($request->user_level >= 5 and $request->user_level <= 6) {
            $request->merge(['role' => 'USER']);
        }
        return $next($request);
    }
}
