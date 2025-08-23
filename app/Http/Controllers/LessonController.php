<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LessonController extends Controller
{
    public function sendTopic($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();

        // API endpoint
        $apiUrl = 'https://nha-tutor.onrender.com/view-lesson';

        // Send request to API
        $response = Http::post($apiUrl, [
            'topic' => $module->title,
        ]);

        $result =  $response->json();

        // Get next and previous modules
        $previousModule = Module::where('category', $module->category)->where('id', '<', $module->id)->orderBy('id', 'desc')->first();
        $nextModule = Module::where('category', $module->category)->where('id', '>', $module->id)->orderBy('id', 'asc')->first();

        return view('pages.lesson', [
            'data' => $result, 
            'module' => $module,
            'previousModule' => $previousModule,
            'nextModule' => $nextModule
        ]);
    }
}