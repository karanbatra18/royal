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
    Route::DELETE('users/{id}', 'Admin\UserController@destroy')->name('user.destroy');
    Route::post('users/vip/{id}', 'Admin\UserController@updateVip')->name('user.status.vip');
    Route::post('users/status/{id}', 'Admin\UserController@updateStatus')->name('user.status.update');
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

    Route::get('caste/create', 'Admin\CasteController@create')->name('caste.create');
Route::post('get_sub_castes', 'Admin\CasteController@getSubCastes')->name('caste.sub_castes');
Route::get('castes', 'Admin\CasteController@index')->name('caste.index');
Route::post('castes', 'Admin\CasteController@store')->name('caste.store');
Route::get('castes/edit/{caste_id}', 'Admin\CasteController@edit')->name('caste.edit');
Route::put('castes/{caste_id}', 'Admin\CasteController@update')->name('caste.update');

  Route::get('emails', 'Admin\EmailController@index')->name('email.index');
  Route::get('email/create', 'Admin\EmailController@create')->name('email.create');


Route::post('emails', 'Admin\EmailController@store')->name('email.store');
Route::get('emails/edit/{email_id}', 'Admin\EmailController@edit')->name('email.edit');
Route::put('emails/{email_id}', 'Admin\EmailController@update')->name('email.update');
 

 Route::get('lead/create', 'Admin\LeadController@create')->name('lead.create');
    Route::post('leads', 'Admin\LeadController@store')->name('lead.store');
    Route::put('leads/{lead_id}', 'Admin\LeadController@update')->name('lead.update');
    Route::get('leads', 'Admin\LeadController@index')->name('lead.index');
    Route::get('leads/edit/{lead_id}', 'Admin\LeadController@edit')->name('lead.edit');
   
    
});

Route::get('country-state-city','CountryStateCityController@index');
Route::post('get-states-by-country','CountryStateCityController@getState');
Route::post('get-cities-by-state','CountryStateCityController@getCity');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
