<?php

/**
 * All route names are prefixed with 'admin.blog'.
 */
Route::group([
    'prefix'     => 'blog',
    'as'         => 'blog.',
    'namespace'  => 'Blog',
], function () {

    /*
     * Post Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsRole:1',
    ], function () {
        Route::group(['namespace' => 'Post'], function () {
            /*
             * Post Status'
             */
            Route::get('post/deactivated', 'PostStatusController@getDeactivated')->name('post.deactivated');
            Route::get('post/deleted', 'PostStatusController@getDeleted')->name('post.deleted');

            /*
             * Post CRUD
             */
            Route::resource('post', 'PostController');

            /*
             * Specific Post
             */
            Route::group(['prefix' => 'post/{post}'], function () {
                // Status
                Route::get('mark/{status}', 'PostStatusController@mark')->name('post.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Deleted Post
             */
            Route::group(['prefix' => 'post/{deletedPost}'], function () {
                Route::get('delete', 'PostStatusController@delete')->name('post.delete-permanently');
                Route::get('restore', 'PostStatusController@restore')->name('post.restore');
            });
        });
    });
});
