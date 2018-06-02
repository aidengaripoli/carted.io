<?php

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/carts', 'CartController@index')->name('carts');
Route::get('/carts/{cart}', 'CartController@show');
