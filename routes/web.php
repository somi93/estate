<?php

//Links
Route::get('/api/links', 'Links@links');
Route::delete('/api/links/delete/{id}', 'Links@destroy');
Route::post('/api/links/update/{id}', 'Links@update');
Route::post('/api/links/insert', 'Links@insert');

//Cities
Route::get('/api/city', 'CityFunctions@cities');
Route::delete('/api/city/{id}', 'CityFunctions@delete');
Route::get('/api/city/{id}', 'CityFunctions@cities');
Route::post('/api/city/update/{id}', 'CityFunctions@update');
Route::post('/api/city/insert', 'CityFunctions@insert');
Route::get('/api/city/areas/{id}', 'CityFunctions@areas');
Route::get('/api/city/streets/{id}', 'CityFunctions@streets');


//Areas
Route::get('/api/area', 'AreaFunctions@areas');
Route::post('/api/area/insert', 'AreaFunctions@insert');
Route::post('/api/area/update/{id}', 'AreaFunctions@update');
Route::delete('/api/area/{id}', 'AreaFunctions@delete');
Route::get('/api/area/streets/{id}', 'AreaFunctions@streets');

//Streets
Route::get('/api/street', 'StreetFunctions@streets');
Route::post('/api/street/insert', 'StreetFunctions@insert');
Route::post('/api/street/update/{id}', 'StreetFunctions@update');
Route::delete('/api/street/{id}', 'StreetFunctions@delete');
Route::get('/api/street/estates/{id}', 'StreetFunctions@estates');

//Estate Type
Route::get('/api/estate_type', 'Estate_Type_Functions@estate_type');

//Estate
Route::get('/api/estate', 'EstateFunctions@estates');
Route::post('/api/estate/insert', 'EstateFunctions@insert');

Route::get('/', 'HomeController@index');
Route::get('home','HomeController@index');
Route::get('admin','AdminController@index');
Route::get('logout','Auth\LogoutController@logout');
Auth::routes();


//Pages
Route::get('/home', 'HomeController@index');
Route::get('/search', 'SearchController@index');
Route::get('/rent', 'newEstateController@index');

