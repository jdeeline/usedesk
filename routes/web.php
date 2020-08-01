<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->get('{any}', 'HomeController@index')->where('any', '.*')->name('home');