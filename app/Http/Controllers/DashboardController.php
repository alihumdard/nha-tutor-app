<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
    }

    return view('pages.dashboard', [
        'user' => $user
    ]);
}


    public function adminDashboard()
    {
        return view('pages.dashboard');
    }
}
