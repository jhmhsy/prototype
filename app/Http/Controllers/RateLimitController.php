<?php

namespace App\Http\Controllers;

use App\Models\RateLimit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RateLimitController extends Controller
{
    public function trackRequest($action)
    {
        $userId = Auth::id();  // For authenticated users, or use Request::ip() for IP-based rate limiting

        RateLimit::create([
            'user_id' => $userId,
            'ip_address' => Request::ip(),
            'requested_at' => now(),
            'action' => $action,
        ]);
    }

    public function checkRateLimit($action, $maxRequests, $timeFrame)
    {
        $userId = Auth::id();  // Or Request::ip() for IP-based limits
        $timeLimit = Carbon::now()->subMinutes($timeFrame);

        $recentRequests = RateLimit::where('action', $action)
            ->where('user_id', $userId)
            ->where('requested_at', '>=', $timeLimit)
            ->count();

        return $recentRequests >= $maxRequests;
    }

    public function performAction()
    {
        $action = 'api_call';  // Name of the action being rate-limited
        $maxRequests = 5;  // Max number of requests
        $timeFrame = 1;  // Time frame in minutes

        if ($this->checkRateLimit($action, $maxRequests, $timeFrame)) {
            return response()->json(['message' => 'Rate limit exceeded'], 429);
        }

        // Track the request
        $this->trackRequest($action);

        // Proceed with the actual action
        return response()->json(['message' => 'Action performed successfully']);
    }
}