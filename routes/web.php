<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// php artisan route:list

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Populates all necessary routes for the PostsController automatically
Route::resource('posts', 'PostsController');

// Auth::routes() is a helper class that helps you generate all the routes required for user authentication
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/email_login', 'Auth\LoginController@email_login')->name('email_login');
Route::post('/email_login', 'Auth\LoginController@postLogin');

Route::get('auth/token/{token}', 'Auth\LoginController@authenticate');
