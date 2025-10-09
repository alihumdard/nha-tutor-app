<?php

namespace App\Http\Middleware;

use App\Models\HomepageContent;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPlanAccess
{
    public function handle(Request $request, Closure $next, ...$allowedPlans)
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        if (!$user || !$user->subscribed('default')) {
            return redirect()->route('home')->with('error', 'You need an active subscription to access this feature.');
        }

        $content = HomepageContent::first();
        $plans = $content ? $content->plans : [];
        $userPlanStripeId = $user->subscription('default')->stripe_price;

        $planMap = [
            isset($plans[0]['stripe_price_id']) ? $plans[0]['stripe_price_id'] : null => 'Half In',
            isset($plans[1]['stripe_price_id']) ? $plans[1]['stripe_price_id'] : null => 'All In',
            isset($plans[2]['stripe_price_id']) ? $plans[2]['stripe_price_id'] : null => 'All or Nothing',
        ];

        $userPlanName = $planMap[$userPlanStripeId] ?? null;

        if (!empty($allowedPlans)) {
            if (!$userPlanName || !in_array($userPlanName, $allowedPlans)) {
                return redirect()->route('dashboard')->with('error', 'Your current plan does not grant access to this feature.');
            }
        }

        return $next($request);
    }
}