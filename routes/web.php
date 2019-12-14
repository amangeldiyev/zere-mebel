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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'HomeController@index');
Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::post('/product/{id}/attribute', 'VoyagerProductsController@addAttribute')->name('attribute.add');
Route::get('/attribute/delete/{id}', 'VoyagerProductsController@deleteAttribute')->name('attribute.delete');
Route::get('/{category}/{subcategory?}', 'HomeController@category')->name('category');
