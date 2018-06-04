<?php

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::view('/dashboard/purchased', 'dashboard.purchased');
Route::view('/dashboard/sold', 'dashboard.sold');

Route::get('/carts', 'CartController@index')->name('carts');
Route::get('/carts/{cart}', 'CartController@show');
