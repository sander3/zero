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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Settings
    Route::group([
        'namespace' => 'Settings',
        'prefix'    => 'settings',
        'as'        => 'settings.',
    ], function () {
        // Account
        Route::get('account', 'AccountController@show')->name('account.show');
        Route::put('account', 'AccountController@update')->name('account.update');
        Route::get('account/delete', 'AccountController@delete')->name('account.delete');
        Route::get('account/destroy', 'AccountController@destroy')->name('account.destroy')->middleware('signed');

        // Security
        Route::get('security', 'SecurityController')->name('security');
    });
});
