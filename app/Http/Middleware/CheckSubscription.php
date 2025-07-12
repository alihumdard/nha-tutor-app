<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        if ($user && $user->subscribed('default')) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You must subscribe to a plan to access this page.');
    }
}
