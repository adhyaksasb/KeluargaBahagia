<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/','HomeController@home');
    Route::get('/genealogy', 'GenealogyController@genealogy');
    Route::get('/gallery', 'GalleryController@gallery');
    Route::get('/login', 'UserController@login');

    // User Register
    Route::match(['get','post'], 'user/register', 'UserController@userRegister');
        
    // User Login
    Route::match(['get','post'], 'user/login', 'UserController@userLogin');

    // User Logout
    Route::match(['get','post'], 'user/logout', 'UserController@userLogout');

    // Family Member Page
    Route::get('/members', 'GenealogyController@members');

    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', 'UserController@dashboard');
        Route::get('/users', 'UserController@users');
    });
});

