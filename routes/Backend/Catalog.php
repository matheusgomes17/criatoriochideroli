<?php

/**
 * All route names are prefixed with 'admin.catalog'.
 */
Route::group([
    'prefix'     => 'catalog',
    'as'         => 'catalog.',
    'namespace'  => 'Catalog',
], function () {

    /*
     * Category Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsRole:1',
    ], function () {

        Route::group(['namespace' => 'Product'], function () {
            
            /*
             * Product Status'
             */
            Route::get('product/deactivated', 'ProductStatusController@getDeactivated')->name('product.deactivated');
            Route::get('product/deleted', 'ProductStatusController@getDeleted')->name('product.deleted');

            /*
             * Specific Product
             */
            Route::group(['prefix' => 'product/{product}'], function () {
                
                // Status
                Route::get('mark/{status}', 'ProductStatusController@mark')->name('product.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Product CRUD
             */
            Route::resource('product', 'ProductController');

            /*
             * Deleted Product
             */
            Route::group(['prefix' => 'product/{deletedProduct}'], function () {
                Route::get('delete', 'ProductStatusController@delete')->name('product.delete-permanently');
                Route::get('restore', 'ProductStatusController@restore')->name('product.restore');
            });
        });

        Route::group(['namespace' => 'Category'], function () {
            
            /*
             * Category Status'
             */
            Route::get('category/deactivated', 'CategoryStatusController@getDeactivated')->name('category.deactivated');
            Route::get('category/deleted', 'CategoryStatusController@getDeleted')->name('category.deleted');

            /*
             * Category CRUD
             */
            Route::resource('category', 'CategoryController');

            /*
             * Deleted Category
             */
            Route::group(['prefix' => 'category/{deletedCategory}'], function () {
                Route::get('delete', 'CategoryStatusController@delete')->name('category.delete-permanently');
                Route::get('restore', 'CategoryStatusController@restore')->name('category.restore');
            });
        });

        Route::group(['namespace' => 'Order'], function () {
            
            Route::get('order/answer', 'OrderAnswerController@index')->name('order.answer.index');
            Route::get('order/{id}/answer', 'OrderAnswerController@create')->name('order.answer.create');
            Route::post('order/{id}/answer', 'OrderAnswerController@store')->name('order.answer.store');
            Route::get('order/{id}/answer/{answerId}', 'OrderAnswerController@show')->name('order.answer.show');
            /*
             * Order CRUD
             */
            Route::resource('order', 'OrderController', ['only' => ['index', 'store']]);
        });
    });
});
