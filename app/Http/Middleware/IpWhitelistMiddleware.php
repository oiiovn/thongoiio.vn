<?php

namespace App\Http\Middleware;

use Closure;

class IpWhitelistMiddleware
{
    // Define the list of allowed IP addresses
    private $allowedIps = [
        '113.160.92.202',
        '113.52.45.78',
        '116.97.245.130',
        '42.118.107.252',
        '113.20.97.250',
        '203.171.19.146',
        '103.220.87.4',
        '103.220.86.4',
    ];

    public function handle($request, Closure $next)
    {
        // Get the client's IP address
        $clientIp = $request->ip();

        // Check if the client's IP is in the whitelist
        if (!in_array($clientIp, $this->allowedIps)) {
            // Client IP is not in the whitelist, return a forbidden response or redirect as needed
            return response()->json(['error' => 'Access Forbidden'], 403);
        }

        // Client IP is in the whitelist, continue to the next middleware or controller
        return $next($request);
    }
}