<?php

namespace App\Http\Middleware;

use App\Models\HomepageContent;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
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
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        if (!$user || !$user->subscribed('default')) {
            return redirect()->route('home')->with('error', 'You must have an active subscription to access this area.');
        }

        // --- NEW: Mobile Access Restriction ---
        if ($request->attributes->get('is_mobile')) {
            // Get user's plan name
            $content = HomepageContent::first();
            $plans = $content ? $content->plans : [];
            $userPlanStripeId = $user->subscription('default')->stripe_price;
            $planMap = [
                isset($plans[0]['stripe_price_id']) ? $plans[0]['stripe_price_id'] : null => 'Half In',
                isset($plans[1]['stripe_price_id']) ? $plans[1]['stripe_price_id'] : null => 'All In',
                isset($plans[2]['stripe_price_id']) ? $plans[2]['stripe_price_id'] : null => 'All or Nothing',
            ];
            $userPlanName = $planMap[$userPlanStripeId] ?? null;
            
            // Define plans allowed on mobile
            $mobileAllowedPlans = ['All In', 'All or Nothing'];

            // Check if the user's plan is allowed
            if (!in_array($userPlanName, $mobileAllowedPlans)) {
                return redirect()->route('home')->with('error', 'Your current plan does not grant mobile access.');
            }
        }
        // --- End of New Code ---

        return $next($request);
    }
}