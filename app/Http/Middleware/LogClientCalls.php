<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use App\Models\LogVnpay;
use Illuminate\Http\Request;

class LogClientCalls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->fullUrl();

        // Define the URLs for which you want to log the client call
        $specialUrl = route('transaction.deposit.ipn');

        // Check if the current URL matches the URLs to be logged
        if (str_contains($url, $specialUrl)) {
            // Log the client call URL
            $clientIPv4 = $request->getClientIp(null, true);

            $log = LogVnpay::create(['ip' => $clientIPv4, 'url' => $url]);
            $request->log_id = $log->id;
            return $next($request);
        }
        return $next($request);
    }
}
