<?php

// Route::resource('/', 'AddressController');

Route::get('/', 'AddressController@index');
Route::post('/create', 'AddressController@create');
Route::get('/destroy/{id}', 'AddressController@destroy');