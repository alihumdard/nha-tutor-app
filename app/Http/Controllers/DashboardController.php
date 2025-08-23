<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\QuizSubmission;
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

        $allModules = Module::all();
        $completedQuizzes = QuizSubmission::where('user_id', $user->id)
            ->where('topic_name', '!=', 'Exam')
            ->pluck('topic_name')
            ->unique();

        $modules = $allModules->map(function ($module) use ($completedQuizzes) {
            $module->completed = $completedQuizzes->contains($module->title);
            return $module;
        });

        $coreModules = $modules->where('category', 'core');
        $losModules = $modules->where('category', 'los');

        $totalModules = $allModules->count();
        $completedCount = $completedQuizzes->count();
        $progressPercentage = ($totalModules > 0) ? round(($completedCount / $totalModules) * 100) : 0;

        return view('pages.dashboard', [
            'user' => $user,
            'coreModules' => $coreModules,
            'losModules' => $losModules,
            'progressPercentage' => $progressPercentage,
        ]);
    }


    public function adminDashboard()
    {
        $user = Auth::user();

        $allModules = Module::all();
        // For admins, we can show a generic or empty progress
        $completedQuizzes = collect();

        $modules = $allModules->map(function ($module) {
            $module->completed = false; // Admins don't have personal progress
            return $module;
        });

        $coreModules = $modules->where('category', 'core');
        $losModules = $modules->where('category', 'los');
        $progressPercentage = 0; // Admins don't have personal progress

        return view('pages.dashboard', [
            'user' => $user,
            'coreModules' => $coreModules,
            'losModules' => $losModules,
            'progressPercentage' => $progressPercentage,
        ]);
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

        if ($request->hasFile('user_pic')) {
            if ($user->user_pic) {
                Storage::delete($user->user_pic);
            }
            $user->user_pic = $request->file('user_pic')->store('profile_pictures', 'public');
        }

        if ($request->hasFile('com_pic')) {
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