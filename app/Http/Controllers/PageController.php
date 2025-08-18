<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PageController extends Controller
{
    public function terms()
    {
        return view('pages.terms_condition');
    }
}
