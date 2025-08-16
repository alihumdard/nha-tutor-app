<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PageController extends Controller
{
    public function quiz($topic_name)
    {
        $result = [];  
        if($topic_name){
            $apiUrl = 'https://nha-tutor.onrender.com/take-quiz';
            $response = Http::post($apiUrl, [
                'topic' => $topic_name,
            ]);
    
            $result =  $response->json();
            dd($result);
        }
        return view('pages.quiz', ['data' => $result]);
    }

    public function terms()
    {
        return view('pages.terms_condition');
    }
}
