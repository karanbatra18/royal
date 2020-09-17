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
    Route::get('birthday/{birthday_date}', 'Admin\BirthdayController@index')->name('admin.birthday');
    Route::get('swyamber/create', 'Admin\SwyamberController@create')->name('swyamber.create');
    Route::post('swyambers', 'Admin\SwyamberController@store')->name('swyamber.store');
    Route::put('swyambers/{swyamber_id}', 'Admin\SwyamberController@update')->name('swyamber.update');
    Route::get('swyambers', 'Admin\SwyamberController@index')->name('swyamber.index');
    Route::get('swyambers/edit/{swyamber_id}', 'Admin\SwyamberController@edit')->name('swyamber.edit');
    Route::get('membership/create', 'Admin\MembershipController@create')->name('membership.create');
    Route::get('memberships', 'Admin\MembershipController@index')->name('membership.index');
    Route::post('memberships', 'Admin\MembershipController@store')->name('membership.store');
    Route::get('memberships/edit/{membership_id}', 'Admin\MembershipController@edit')->name('membership.edit');
    Route::put('memberships/{membership_id}', 'Admin\MembershipController@update')->name('membership.update');
    Route::get('match', 'Admin\MatchController@index')->name('admin.match');
    Route::get('caste/create', 'Admin\CastController@create')->name('caste.create');
Route::get('castes', 'Admin\CastController@index')->name('caste.index');
Route::post('castes', 'Admin\CastController@store')->name('caste.store');
Route::get('castes/edit/{caste_id}', 'Admin\CastController@edit')->name('caste.edit');
Route::put('castes/{caste_id}', 'Admin\CastController@update')->name('caste.update');

    
});

Route::get('country-state-city','CountryStateCityController@index');
Route::post('get-states-by-country','CountryStateCityController@getState');
Route::post('get-cities-by-state','CountryStateCityController@getCity');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
