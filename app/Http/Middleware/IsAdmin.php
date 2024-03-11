<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is an admin
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect or return a response indicating unauthorized access
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
