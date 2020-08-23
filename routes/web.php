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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function() {

    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    // Route::post('create', 'VideoRoomsController@createRoom');
    Route::get('user', 'Admin\UserController@create')->name('user.create');
    
     Route::get('users', 'Admin\UserController@index')->name('user.index');
     Route::get('edit_user', 'Admin\UserController@edit')->name('user.edit');
   
     Route::post('user', 'Admin\UserController@store')->name('user.store');
  
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
