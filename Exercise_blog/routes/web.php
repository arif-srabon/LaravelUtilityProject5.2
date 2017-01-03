<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/setlang/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return Redirect::back();
});
Route::get('/', function () {
    return view('dashboard');
});
Route::get('dashboard/{locale}', function ($locale) {
    session(['Lang' => $locale]);
    return redirect('/dashboard');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'User\LoginController@index'); //login
    Route::post('/logincheck', 'User\LoginController@logincheck');
    Route::get('/logout', 'User\LoginController@logout');
    Route::get('/division','Setup\DivisionController@index');
});


Route::post('/division/{type}','Setup\DivisionController@division_data');
Route::get('dashboard', 'DahsboardController@index');
Route::get('user', 'User\UserController@index');
Route::post('/user/read', 'User\UserController@read');
Route::get('user/create', 'User\UserController@create');
Route::post('user/store', 'User\UserController@store');
