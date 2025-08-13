<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LessonController extends Controller
{
    public function sendTopic($topic_name)
    {

        // API endpoint
        $apiUrl = 'https://f0d3ddb6a101.ngrok-free.app/view-lesson';

        // Send request to API
        $response = Http::post($apiUrl, [
            'topic' => $topic_name,
        ]);

        $result =  $response->json();
        return view('pages.lesson', ['data' => $result]);
    }
}
