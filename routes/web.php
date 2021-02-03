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


Auth::routes();

Route::get('/','frontController@index');
Route::get('/allproducts','frontController@getAllProducts');
Route::get('/countcart','frontController@counCart');
Route::post('/addtocart/{id}','frontController@addcart');
Route::get('/getCart','frontController@getCart');
Route::post('/updateCart',"frontController@updateCart");
Route::delete('/delete/{id}/cart','frontController@delete');
