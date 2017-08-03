<?php

/**
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */
Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {

    /*
     * These routes require the user to be logged in
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::get('sair', 'LoginController@logout')->name('logout');

        //For when admin is logged in as user from backend
        Route::get('sair-como', 'LoginController@logoutAs')->name('logout-as');

        // Change Password Routes
        Route::patch('senha/alterar', 'ChangePasswordController@changePassword')->name('password.change');

        // Change Phone Routes
        Route::patch('telefone/alterar', 'ChangePhoneController@changePhone')->name('phone.change');
    });

    /*
     * These routes require no user to be logged in
     */
    Route::group(['middleware' => 'guest'], function () {
        // Authentication Routes
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login.post');

        // Socialite Routes
        Route::get('login/{provider}', 'SocialLoginController@login')->name('social.login');

        // Registration Routes
        if (config('access.users.registration')) {
            Route::get('registrar', 'RegisterController@showRegistrationForm')->name('register');
            Route::post('registrar', 'RegisterController@register')->name('register.post');
        }

        // Confirm Account Routes
        Route::get('conta/confirmar/{token}', 'ConfirmAccountController@confirm')->name('account.confirm');
        Route::get('conta/confirmar/re-enviar/{user}', 'ConfirmAccountController@sendConfirmationEmail')->name('account.confirm.resend');

        // Password Reset Routes
        Route::get('senha/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.email');
        Route::post('senha/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email.post');

        Route::get('senha/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
        Route::post('senha/reset', 'ResetPasswordController@reset')->name('password.reset');
    });
});
