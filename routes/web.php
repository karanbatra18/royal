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


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});

Route::prefix('admin')->middleware('auth')->group(function() {

    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    // Route::post('create', 'VideoRoomsController@createRoom');
    Route::get('users/create', 'Admin\UserController@create')->name('user.create');
    Route::get('users', 'Admin\UserController@index')->name('user.index');
    Route::get('users/{user_id}', 'Admin\UserController@edit')->name('user.edit');
    Route::post('users', 'Admin\UserController@store')->name('user.store');
    Route::put('users/{user}', 'Admin\UserController@update')->name('user.update');
    Route::put('users-profile/{user}', 'Admin\UserController@updateProfile')->name('user.update_profile');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
