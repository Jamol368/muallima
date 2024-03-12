<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackButtonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Add cache control headers
        $response->headers->add(['Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate, post-check=0, pre-check=0']);
        $response->headers->add(['Pragma' => 'no-cache']);
        $response->headers->add(['Expires' => 0]);

        return $response;
    }
}
