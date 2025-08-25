<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function subscribe(Request $request, string $priceId)
    {
        if ($request->user()->subscribed('default')) {
            return redirect()->route('home')->with('error', 'You are already subscribed to a plan.');
        }

        Notification::create([
            'user_id' => $request->user()->id,
            'title' => 'New Subscription',
            'message' => $request->user()->name . ' has subscribed to a new plan.',
        ]);

        return $request->user()
            ->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => route('subscribe.success'),
                'cancel_url' => route('home'),
            ]);
    }

    public function success()
    {
        return view('pages.subscription-success');
    }

    public function swapPlan(Request $request, string $priceId)
    {
        if ($request->user()->subscribed('default')) {
            $request->user()->subscription('default')->swap($priceId);
            return redirect()->route('dashboard')->with('success', 'Your plan has been changed successfully!');
        }
        return redirect()->route('home')->with('error', 'You do not have an active subscription to swap.');
    }

    public function cancelSubscription(Request $request)
    {
        $request->user()->subscription('default')->cancelNow();

        Notification::create([
            'user_id' => $request->user()->id,
            'title' => 'Subscription Canceled',
            'message' => $request->user()->name . ' has canceled their subscription.',
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Your subscription has been successfully canceled.');
    }
}
