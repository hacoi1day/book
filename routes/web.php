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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [
        'as' => 'category.list',
        'uses' => 'CategoryController@index'
    ]);
    Route::post('store', [
        'as' => 'category.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'CategoryController@edit'
    ]);
    Route::post('update/{id}', [
        'as' => 'category.update',
        'uses' => 'CategoryController@update'
    ]);
    Route::get('delete/{id}', [
        'as' => 'category.delete',
        'uses' => 'CategoryController@delete'
    ]);
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [
        'as' => 'product.list',
        'uses' => 'ProductController@index'
    ]);
    Route::get('add', [
        'as' => 'product.add',
        'uses' => 'ProductController@add'
    ]);
    Route::post('store', [
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('edit/{id}', [
        'as' => 'product.edit',
        'uses' => 'ProductController@edit'
    ]);
    Route::post('update/{id}', [
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::get('delete/{id}', [
        'as' => 'product.delete',
        'uses' => 'ProductController@delete'
    ]);
});

Route::get('test', function () {
    return view('admin.app');
});
