<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.landingpage');
});
Route::get('/login', function () {
    return view('pages.auth.login');
});
Route::get('/signup', function () {
    return view('pages.auth.Signup');
});

Route::get('/Moduledetail', function () {
    return view('pages.Moduledetail');
});
Route::get('/terms&Condition', function () {
    return view('pages.Terms&Condition');
});
Route::get('/homedetail', function () {
    return view('pages.homedetail');
});

Route::get('/New_homedetail', function () {
    return view('pages.New_homedetail');
});

Route::get('/New_Moduledetail', function () {
    return view('pages.New_Moduledetail');
});
