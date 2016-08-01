<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

/**
 * Login Routes
 */
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

/**
 * Registration Routes
 */
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

/**
 * Password Reset Routes
 */
Route::get('password/reset/{token?}', ['as' => 'auth.pass.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.pass.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.pass.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::group(['middleware' => 'isroleadmin'], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::resource('admin','UserController');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function () {
        Route::resource('users','UserController');
    });
});

/**
 *Socialite
 */
Route::get('/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'SocialAuthController@redirect']);
Route::get('/callback/{provider}', ['as' => 'social.callback', 'uses' => 'SocialAuthController@callback']);
