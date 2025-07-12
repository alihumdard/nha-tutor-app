<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function quiz()
    {
        return view('pages.quiz');
    }

    public function terms()
    {
        return view('pages.terms_condition');
    }
}
