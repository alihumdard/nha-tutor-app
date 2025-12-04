<?php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PageController extends Controller
{
    public function terms()
    {
       $content = HomepageContent::first(); 
        
        // Pass the content to the view
        return view('pages.terms_condition', compact('content'));
    }
}
