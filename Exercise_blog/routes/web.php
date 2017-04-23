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
    Route::get('/', 'HomeController@index');
    Route::get('/login', 'User\LoginController@index'); //login
    Route::post('/logincheck', 'User\LoginController@logincheck');
    Route::get('/logout', 'User\LoginController@logout');
    Route::get('/division','Setup\DivisionController@index');
//////////////////////
    Route::resource('/district','Setup\DistrictController');
    Route::resource('/thanaupzilla','Setup\ThanaUpzillaController');
});
//thana_upzilla
Route::get('/thanaupazilla/create','Setup\ThanaUpzillaController@create');
Route::get('/thanaupzilla/edit/{id}','Setup\ThanaUpzillaController@edit');
Route::post('/thanaupazilla/read','Setup\ThanaUpzillaController@read');
Route::post('/thanaupazilla/update{id}','Setup\ThanaUpzillaController@update');
Route::get('/thanaupazilla/getDistrict/{DivisionID}','Setup\ThanaUpzillaController@getDistrict');
//division
Route::post('/division/{type}','Setup\DivisionController@division_data');
//district
Route::get('/district/create','Setup\DistrictController@create');
Route::post('/district/read','Setup\DistrictController@read');
Route::post('/district/destroy','Setup\DistrictController@destroy');

//dashboard
Route::get('dashboard', 'DahsboardController@index');
Route::get('user', 'User\UserController@index');
Route::post('/user/read', 'User\UserController@read');
Route::get('user/create', 'User\UserController@create');
Route::post('user/store', 'User\UserController@store');

// route for import
Route::get('importfile','Import\ImportController@index');
Route::post('importfile/store','Import\ImportController@store');
//
Route::get('angularjs','AngularjsController@index');
