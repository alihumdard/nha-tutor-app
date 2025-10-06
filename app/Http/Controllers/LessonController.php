<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\QuizSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LessonController extends Controller
{
    public function sendTopic($slug)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }


        $allModules = Module::all();

        // ** THIS IS THE FIX **
        // This logic now applies to all users, including admins.
        $completedQuizzes = QuizSubmission::where('user_id', $user->id)
            ->where('status', 'completed')
            ->where('topic_name', '!=', 'Exam')
            ->pluck('module_id')
            ->unique();

        $modules = $allModules->map(function ($module) use ($completedQuizzes) {
            $module->completed = $completedQuizzes->contains($module->id);
            return $module;
        });

        $coreModules = $modules->where('category', 'core');
        $losModules = $modules->where('category', 'los');

        $totalModules = $allModules->count();
        $completedCount = $completedQuizzes->count();
        $progressPercentage = ($totalModules > 0) ? round(($completedCount / $totalModules) * 100) : 0;


        $module = Module::where('slug', $slug)->firstOrFail();
        
        // API endpoint
        $apiUrl = 'https://nha-tutor.onrender.com/view-lesson';

        // Send request to API
        $response = Http::timeout(120)->post($apiUrl, [
            'topic' => $module->title,
            'lesson_type' => $module->category,
        ]);

        $result =  $response->json();

        // Get next and previous modules
        $previousModule = Module::where('category', $module->category)->where('id', '<', $module->id)->orderBy('id', 'desc')->first();
        $nextModule = Module::where('category', $module->category)->where('id', '>', $module->id)->orderBy('id', 'asc')->first();

        return view('pages.lesson', [
            'data' => $result,
            'module' => $module,
            'previousModule' => $previousModule,
            'nextModule' => $nextModule,
            'progressPercentage' => $progressPercentage
        ]);
    }
}
