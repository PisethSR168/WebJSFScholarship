<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Allow 'unsafe-eval' for development/Alpine/Vue
        $csp = "default-src 'self' http: https: data: blob: 'unsafe-inline' 'unsafe-eval';";
        $csp .= "img-src 'self' http: https: data: blob:;";
        $csp .= "font-src 'self' http: https: data:;";

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
