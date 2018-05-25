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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminsController@index')->name('admin');
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('adminLoginForm');
    Route::post('login', 'Auth\AdminLoginController@login')->name('adminLoginSubmit');
    Route::post('login/logout', 'Auth\AdminLoginController@logout')->name('adminLogout');
    
    // reset password
    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('adminResetEmail'); // admin.password.email
    Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('adminResetRequestForm'); // admin.password.request
    Route::post('password/reset', 'Auth\AdminResetPasswordController@reset')->name('resetPostRequest');
    Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('adminShowResetForm'); // admin.password.reset

});

