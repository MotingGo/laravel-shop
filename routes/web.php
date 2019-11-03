<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@root')->name('boot');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
