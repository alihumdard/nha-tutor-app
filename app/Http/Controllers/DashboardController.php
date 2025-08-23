<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    public function showProfile()
    {
        return view('pages.profile');
    }
    
    public function editProfile()
    {
        return view('pages.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:255'],
            'com_name' => ['nullable', 'string', 'max:255'],
            'user_pic' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'com_pic' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->com_name = $request->com_name;

        // Handle profile picture upload
        if ($request->hasFile('user_pic')) {
            // Delete old picture if it exists
            if ($user->user_pic) {
                Storage::delete($user->user_pic);
            }
            $user->user_pic = $request->file('user_pic')->store('profile_pictures', 'public');
        }

        // Handle company picture upload
        if ($request->hasFile('com_pic')) {
            // Delete old picture if it exists
            if ($user->com_pic) {
                Storage::delete($user->com_pic);
            }
            $user->com_pic = $request->file('com_pic')->store('company_pictures', 'public');
        }
        
        $user->save();

        return back()->with('status', 'Profile updated successfully!');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Password updated successfully!');
    }
}