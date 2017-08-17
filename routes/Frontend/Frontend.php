<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('sobre-nos', 'FrontendController@about')->name('about');
Route::get('categoria/{id}', 'FrontendController@category')->name('category')->where('id', '[0-9]+');
Route::get('produto/{id}', 'FrontendController@product')->name('product')->where('id', '[0-9]+');

Route::group(['prefix' => 'contato', 'as' => 'contact.', 'namespace' => 'Contact'], function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('/', 'ContactController@store')->name('store');
});

Route::get('pesquisa', 'FrontendController@search')->name('search');

Route::get('galeria-de-imagens', 'FrontendController@gallery')->name('gallery');

Route::group(['prefix' => 'newsletter', 'as' => 'newsletter.', 'namespace' => 'Newsletter'], function () {
    Route::get('inscrito', 'NewsletterController@show')->name('show');
    Route::post('inscrito', 'NewsletterController@store')->name('store');
});

Route::group(['prefix' => 'carrinho', 'namespace' => 'Cart'], function () {
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::get('adiciona/{id}', 'CartController@store')->name('cart.store');
    Route::get('remove/{id}', 'CartController@destroy')->name('cart.destroy');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('checkout', 'CheckoutController@store')->name('cart.checkout.store');
        Route::get('orcamento/{id}', 'CheckoutController@show')->name('cart.checkout.show');
        Route::get('orcamento/{id}/resposta', 'CheckoutController@done')->name('cart.checkout.done');
    });
});

Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
    Route::get('post/{id}', 'BlogController@show')->name('post.show');
});

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Account Specific
         */
        Route::group(['prefix' => 'minha-conta'], function () {
            Route::get('/', 'AccountController@index')->name('account');

            /*
             * User Orders Specific
             */
            Route::get('orcamento', 'OrderController@index')->name('order.index');
            Route::get('orcamento/{id}', 'OrderController@show')->name('order.show');
            Route::get('orcamento/{id}/pdf', 'OrderController@pdf')->name('order.pdf');
        });

        Route::get('imprimir/orcamento/{id}', 'OrderController@print')->name('order.print');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
