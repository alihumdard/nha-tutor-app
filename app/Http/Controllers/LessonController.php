<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LessonController extends Controller
{
    public function sendTopic($topic_name)
    {

        // API endpoint
        $apiUrl = 'https://nha-tutor.onrender.com/view-lesson';

        // Send request to API
        $response = Http::post($apiUrl, [
            'topic' => $topic_name,
        ]);

        $result =  $response->json();
        return view('pages.lesson', ['data' => $result, 'topic_name' => $topic_name]);
    }
}
