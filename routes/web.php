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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/404', function () {
    return view('errors/404');
});

Route::get('/post', function () {
    return view('front-end/post-img');
});

Route::get('custom-pagination','BlogController@index');

//route middleware group
Route::group(['middleware'=>['web']], function()
{
	Route::resource('/','HomeController');
	Route::resource('/profile','ProfileController');
	Route::resource('/resume','ResumeController');
	Route::resource('/portfolio','PortfolioController');
	Route::resource('/blog','BlogController');
	Route::resource('/category','CategoryController');
	Route::resource('/contact','ContactController');
});