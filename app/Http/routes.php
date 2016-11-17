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
    Route::get('admin/users', 'AuthController@users');
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('/', function () {
        return view('welcome');
    });

    // https://laravel.com/docs/5.1/controllers#restful-resource-controllers
    Route::resource('articles', 'ArticlesController');
    Route::resource('user', 'Auth\AuthController');

});

// https://mattstauffer.co/blog/middleware-groups-in-laravel-5-2
Route::group(['middleware' => 'admin'], function () {
    Route::get('articles/create', 'ArticlesController@create');
    Route::get('articles/{articles}/edit', 'ArticlesController@edit');
    Route::get('admin/users', 'Auth\AuthController@users');
    Route::get('admin/users/{users}/destroy', 'Auth\AuthController@destroy');
});
