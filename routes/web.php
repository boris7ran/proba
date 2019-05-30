<?php

use App\Post;
//use App\Http\Controllers;
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
    return view('welcome');
});
Route::get('/posts', ['as' => 'all-post', 'uses' => 'PostsController@index']);
Route::get('/posts/create', ['as' => 'store-create', 'uses' => 'PostsController@create']);
Route::post('/posts', ['as' => 'store-post', 'uses' => 'PostsController@store']);
Route::get('/register', ['as' => 'register-user', 'uses' => 'RegisterController@create']);
Route::post('/register', ['as' => 'store-register', 'uses' => 'RegisterController@store']);
Route::get('/login', ['as' => 'login-user', 'uses' => 'LoginController@create']);
Route::post('/login', ['as' => 'store-login', 'uses' => 'LoginController@store']);
Route::get('/logout', ['as' => 'logout-user', 'uses' => 'LoginController@destroy']);
Route::post('/posts/{postId}/comments', ['as' => 'comments-post', 'uses' => 'CommentsController@store']);
Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);
