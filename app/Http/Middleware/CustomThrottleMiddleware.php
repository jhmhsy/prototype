<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class CustomThrottleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $key = $request->ip(); // You can also use another unique identifier like user_id if needed

        // Define the max number of attempts and the decay time (in seconds)
        $maxAttempts = 5;
        $decaySeconds = 8; // 60 seconds cooldown

        // Check if the request has exceeded the rate limit
        // But do not block the request, only track attempts
        if (RateLimiter::tooManyAttempts($key, $maxAttempts, $decaySeconds)) {
            // Optionally, you can return a custom response or just let the request proceed
            $seconds = RateLimiter::availableIn($key);

            // Just track the wait time but don't block the request
            return response()->json([
                'status' => 'verification-throttled',
                'wait' => $seconds
            ], 429); // You can keep the response as is or customize it
        }

        // Record the attempt (this keeps track of how many times the user tries within the window)
        RateLimiter::hit($key, $decaySeconds);

        // Allow the request to proceed without blocking it
        return $next($request);
    }
}