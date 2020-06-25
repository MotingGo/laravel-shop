<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', 'PagesController@root')->name('boot')->middleware('verified');
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
    Route::get('user_address/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
    Route::put('user_address/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
    Route::delete('user_address/{user_address}', 'UserAddressesController@destroy')->name('user_address.destroy');
    Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
    Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
    Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');
    Route::post('cart', 'CartController@add')->name('cart.add');
    Route::post('cart', 'CartController@index')->name('cart.index');
});

Route::redirect('/', '/products')->name('root');
Route::get('products', 'ProductsController@index')->name('products.index');
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
