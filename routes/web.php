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

Route::get('/blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('/contact', 'PageController@getContact');
Route::post('/contact', 'PageController@postContact');
Route::get('/about', 'PageController@getAbout');
Route::get('/settings', 'PageController@getSettings');
Route::get('/', 'PageController@getIndex');

// AUTHENTICATION ROUTES
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::get('/auth/logout', 'Auth\LoginController@logout');
Route::post('/auth/login', 'Auth\LoginController@login');

// REGISTER ROUTES
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');

Route::resource('/categories', 'CategoryController', ['except' => ['create']]);
Route::resource('/tags', 'TagController', ['except' => ['create']]);
Route::resource('/posts', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index');
