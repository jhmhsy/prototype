<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRoles = Auth::user()->roles->pluck('name')->toArray();

        if (!array_intersect($userRoles, ['Admin', 'SuperAdmin'])) {
            abort(404); // Forbidden
        }

        return $next($request);
    }
}