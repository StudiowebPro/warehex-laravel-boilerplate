<?php
/**
 * Laravel Warehex-boilerplate
 * User: Kylrad
 * Company: Warehex
 * http://studioweb.pro
 * Date: 02.05.2017
 * Time: 14:36
 */

/*
 * These routes require no user to be logged in
 */
Route::group(['namespace' => 'Access\Front\User\Controllers',
              'middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    // Socialite Routes
    Route::get('login/{provider}', 'SocialLoginController@login')->name('social.login');

    // Registration Routes
    if (config('access.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');
    }

    // Confirm Account Routes
    Route::get('account/confirm/{token}', 'ConfirmAccountController@confirm')->name('account.confirm');
    Route::get('account/confirm/resend/{user}', 'ConfirmAccountController@sendConfirmationEmail')->name('account.confirm.resend');

    // Password Reset Routes
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.email');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
});