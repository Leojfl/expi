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

Route::view('/',
    'auth.login')
    ->name('login')
    ->middleware('guest');

Route::get('/logout',
    'Auth\LoginController@logout')
    ->name('logout')
    ->middleware('auth');

Route::post('/login-post',
    'Auth\LoginController@autenticate')
    ->name('login_post')
    ->middleware('guest');

Route::view('/register',
    'auth.register')
    ->name('register')
    ->middleware('guest');

Route::post('/register-post/{userId}',
    'Parking\RegisterController@upsert')
    ->name('register_post')
    ->middleware('guest');

Route::view('/home', 'welcome')
    ->name('home')
    ->middleware('auth');
