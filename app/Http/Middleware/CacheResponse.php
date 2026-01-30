<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  int  $ttl  Cache TTL in seconds (default: 1 day)
     */
    public function handle(Request $request, Closure $next, int $ttl = 86400): Response
    {
        $response = $next($request);

        // Only cache successful GET requests
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            $response->headers->set('Cache-Control', "public, max-age={$ttl}");
            $response->headers->set('Vary', 'Accept-Encoding, Accept-Language');
        }

        return $response;
    }
}
