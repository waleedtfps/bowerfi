<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
   return redirect('login');
});



Route::get('index', function () {
    return view('layouts.index');
});


Route::get('login', function () {
    return view('user.login');
});

Route::get('register', function () {
    return view('user.register');
});
route::post('register','RegistrationController@create');