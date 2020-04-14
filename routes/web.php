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

Route::get('/', 'PlayersController@index');
Route::get('/about', 'PlayersController@about');
Route::get('/services', 'PlayersController@services');

Route::resource('posts','PostsController');



