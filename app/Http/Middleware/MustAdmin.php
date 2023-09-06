<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $level = auth()->user()->user_level ?? 0;
            if ($level >= 1 and $level <= 4) {
                return $next($request);
            }
        }

        if ($request->route()->getPrefix() === 'api') {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            return redirect()->route('home');
        }
    }
}
