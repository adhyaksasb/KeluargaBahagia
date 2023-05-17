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
    Route::get('genealogy', 'GenealogyController@genealogy');
    Route::get('gallery', 'GalleryController@gallery');
    Route::get('login', 'UserController@login');

    // User Register
    Route::match(['get','post'], 'user/register', 'UserController@userRegister');
        
    // User Login
    Route::match(['get','post'], 'user/login', 'UserController@userLogin');

    // User Logout
    Route::match(['get','post'], 'user/logout', 'UserController@userLogout');

    // Family Member Page
    Route::get('members', 'GenealogyController@members');

    Route::prefix('admin')->group(function() {
        Route::group(['middleware'=>'auth'], function() {
            Route::get('dashboard', 'AdminController@dashboard');
            // Users Page
            Route::get('users', 'AdminController@users');
            Route::post('update-user-status', 'AdminController@updateUserStatus');
            Route::get('delete-user/{id}', 'AdminController@deleteUser');
            // Family Members Page
            Route::get('members', 'AdminController@familyMembers');
            Route::post('update-member-status', 'AdminController@updateMemberStatus');
            Route::get('delete-member/{id}', 'AdminController@deleteMember');
            Route::match(['get', 'post'], 'add-member', 'AdminController@addMember');
            Route::match(['get', 'post'], 'edit-member/{id}', 'AdminController@editMember');
            Route::match(['get', 'post'], 'register-member', 'AdminController@registerMember');
            // Relationship Page
            Route::get('relationships', 'AdminController@relationships');
            Route::match(['get', 'post'], 'relationships/add-relationship', 'AdminController@addRelationship');
            Route::match(['get', 'post'], 'relationships/edit-relationship/{id}', 'AdminController@editRelationship');
            Route::post('update-relationship-status', 'AdminController@updateRelationshipStatus');
            Route::get('delete-relationship/{id}', 'AdminController@deleteRelationship');
            // Gallery Page
            Route::get('galleries', 'AdminController@galleries');
            Route::match(['get', 'post'], 'add-image', 'AdminController@addGallery');
            Route::match(['get', 'post'], 'edit-image/{id}', 'AdminController@editGallery');
            Route::post('update-gallery-status', 'AdminController@updateGalleryStatus');
            Route::get('delete-gallery/{id}', 'AdminController@deleteGallery');
        });
    });
});

