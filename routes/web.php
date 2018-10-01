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

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/product/{id}', [
    'uses' => 'FrontendController@single',
    'as' => 'product.single'
]);

Route::post('/cart/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/product/remove/{id}', [
    'uses' => 'ShoppingController@product_remove',
    'as' => 'product.remove'
]);

Route::get('/product/incr/{id}/{qty}', [
    'uses' => 'ShoppingController@product_incr',
    'as' => 'product.incr'
]);

Route::get('/product/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@product_decr',
    'as' => 'product.decr'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductsController');

