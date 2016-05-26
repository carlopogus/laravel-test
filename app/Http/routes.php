<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('carl', 'CarlController@index');
Route::get('about', 'PagesController@about');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // https://mattstauffer.co/blog/the-auth-scaffold-in-laravel-5-2
    Route::auth();
    // https://laravel.com/docs/5.1/controllers#restful-resource-controllers
    Route::resource('articles', 'ArticlesController');

});

// https://mattstauffer.co/blog/middleware-groups-in-laravel-5-2
Route::group(['middleware' => 'admin'], function () {
    Route::get('articles/create', 'ArticlesController@create');
});
