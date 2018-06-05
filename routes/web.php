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

Route::get('tickets/fechar/{uuid}',[
    'as' => 'tickets.fechar',
    'uses' => 'TicketsController@fechar'
]);

Route::get('tickets/abrir/{uuid}',[
    'as' => 'tickets.abrir',
    'uses' => 'TicketsController@abrir'
]);

Route::get('tickets/destroy/{uuid}',[
    'as' => 'tickets.destroy',
    'uses' => 'TicketsController@destroy'
]);

Route::get('/home', 'HomeController@index')->name('home');

// Ticket routes
Route::resource('tickets', 'TicketsController');

// Users
Route::resource('users', 'UsersController');

// Comments routes
Route::resource('comments', 'CommentsController');

