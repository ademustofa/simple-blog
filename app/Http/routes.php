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
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Authentication Route 
Route::get('auth/login', ['as'  => 'login', 'uses'  => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'  => 'logout', 'uses'  =>'Auth\AuthController@getLogout']);

// Register Route
Route::get('auth/register', ['as'  => 'register', 'uses'  =>'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Passoword Reset Route
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Categories
Route::resource('categories', 'CategoryController', ['except' => 'create']);
// Tags
Route::resource('tags', 'TagController', ['except' => 'create']);

Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);



Route::get('/blog', ['uses'  => 'BlogController@getIndex', 'as'  => 'blog.index']);
Route::get('/', 'ProfilController@index');
Route::get('about', 'ProfilController@about');
Route::get('contact', 'ProfilController@contact');
Route::post('contact', 'ProfilController@postContact');
Route::resource('posts', 'PostController');
/*Route::get('/get_post', 'PostController@get_post');*/
Route::get('/get_categories', 'CategoryController@get_categories');

