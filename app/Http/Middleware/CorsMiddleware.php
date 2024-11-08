<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE,PUT');
        $response->headers->set('Access-Control-Allow-Headers', ['*']);

        return $response;
    }
}