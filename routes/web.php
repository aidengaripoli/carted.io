<?php

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::view('/dashboard/purchased', 'dashboard.purchased');
Route::view('/dashboard/sold', 'dashboard.sold');

Route::get('/dashboard/cards', 'CardsController@index');

Route::get('/cards', 'CardsController@index');

Route::get('/carts', 'CartsController@index')->name('carts');
Route::get('/carts/{cart}', 'CartsController@show');

Route::post('/carts/{cart}/purchase', 'PurchasesController@store');
