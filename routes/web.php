<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('itemindex','ItemController@index');
Route::get('itemform', 'ItemController@form');
Route::post('save','ItemController@save');
Route::get('EditProduct/{id}','ItemController@edit');
Route::post('update','ItemController@update');
Route::get('DeleteProduct/{id}','ItemController@delete');
