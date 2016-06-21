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

Route::get('/', ['as' => 'store.home', 'uses' => 'StoreController@index'] );
Route::get( '/category/{id}', ['as' => 'store.bycategory', 'uses' => 'StoreController@listByCategory' ] );
Route::get( '/product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product' ] );
Route::get( '/tag/{id}', ['as' => 'store.bytag', 'uses' => 'StoreController@listByTag' ] );
Route::get( '/cart', ['as' => 'cart', 'uses' => 'CartController@index' ] );
Route::get( '/cart/{id}/add', ['as' => 'cart.add', 'uses' => 'CartController@add' ] );
Route::get( '/cart/{id}/destroy', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy' ] );

/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function(){
        return redirect(route( 'admin.products' ));
    });

    Route::group(['prefix' => 'categories'], function(){
        Route::get( '/', ['as'=>'admin.categories', 'uses' => 'AdminCategoriesController@index'] );
        Route::get( '/create', ['as'=>'admin.categories.create', 'uses' => 'AdminCategoriesController@create'] );
        Route::post( '/store', ['as'=>'admin.categories.store', 'uses' => 'AdminCategoriesController@store'] );
        Route::get( '/show/{id}', ['as'=>'admin.categories.show', 'uses' => 'AdminCategoriesController@show'] );
        Route::get( '/edit/{id}', ['as'=>'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit'] );
        Route::put( '/update/{id}', ['as'=>'admin.categories.update', 'uses' => 'AdminCategoriesController@update'] );
        Route::get( '/destroy/{id}', ['as'=>'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy'] );
    });

    Route::group(['prefix' => 'products'], function(){
        Route::get( '/', ['as'=> 'admin.products', 'uses' => 'AdminProductsController@index'] );
        Route::get( '/create', ['as'=>'admin.products.create', 'uses' => 'AdminProductsController@create'] );
        Route::post( '/store', ['as'=>'admin.products.store', 'uses' => 'AdminProductsController@store'] );
        Route::get( '/show/{id}', ['as'=>'admin.products.show', 'uses' => 'AdminProductsController@show'] );
        Route::get( '/edit/{id}', ['as'=>'admin.products.edit', 'uses' => 'AdminProductsController@edit'] );
        Route::put( '/update/{id}', ['as'=>'admin.products.update', 'uses' => 'AdminProductsController@update'] );
        Route::get( '/destroy/{id}', ['as'=>'admin.products.destroy', 'uses' => 'AdminProductsController@destroy'] );

        Route::get('/{id}/images', ['as'=>'admin.products.images', 'uses' => 'AdminProductsController@images']);
        Route::get('/{id}/createimage', ['as'=>'admin.products.createimage', 'uses' => 'AdminProductsController@createimage']);
        Route::post('/{id}/storeimage', ['as'=>'admin.products.storeimage', 'uses' => 'AdminProductsController@storeimage']);
        Route::get('/destroyimage/{id}', ['as'=>'admin.products.destroyimage', 'uses' => 'AdminProductsController@destroyimage']);
    });
});
