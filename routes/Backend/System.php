<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'     => 'system',
    'as'         => 'system.',
    'namespace'  => 'System',
], function () {

    /*
     * Contact Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsRole:1',
        'prefix' => 'contact',
        'as' => 'contact.',
        'namespace' => 'Contact'
    ], function () {

        Route::get('/', 'ContactController@index')->name('index');
        Route::get('answer', 'ContactAnswerController@index')->name('answer.index');
        Route::get('{id}/answer', 'ContactAnswerController@create')->name('answer.create');
        Route::post('{id}/answer', 'ContactAnswerController@store')->name('answer.store');
        Route::get('{id}/answer/{answerId}', 'ContactAnswerController@show')->name('answer.show');
    });

    /*
     * Gallery Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsRole:1',
        'namespace' => 'Gallery'
    ], function () {

        Route::resource('gallery', 'GalleryController', ['except' => ['show']]);
    });
});
