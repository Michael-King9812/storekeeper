<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'manager') {
            return $next($request);
        }

        if (auth()->user()->role == null) {
            return redirect()->route('login');
        }

        // Logout the user if not authorized
        Auth::logout();

        return redirect()->route('login')->with('fail', 'User not authorized!');
    }
}
