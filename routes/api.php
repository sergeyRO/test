<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('books', 'BookController');
Route::post('books', 'BookController@store');
Route::get('books/{book}', 'BookController@show');
Route::delete('books/{book}', 'BookController@destroy');
Route::put('books/{book}', 'BookController@update');

Route::apiResource('genres', 'GenreController');
Route::post('genres', 'GenreController@store');
Route::get('genres/{genre}', 'GenreController@show');
Route::delete('genres/{genre}', 'GenreController@destroy');
Route::put('genres/{id}', 'GenreController@update');

Route::apiResource('shops', 'ShopController');
Route::post('shops', 'ShopController@store');
Route::get('shops/{shop}', 'ShopController@show');
Route::delete('shops/{shop}', 'ShopController@destroy');
Route::put('shops/{shop}', 'ShopController@update');
//---- не простые
//Книги в Магазинах
Route::apiResource('book_shop/', 'HomeController');
//Добавить книгу в магазин
Route::post('book_shop/', 'HomeController@store');
//В каких магазинах есть книга
Route::get('book_shop/{book}', 'HomeController@showBook');
//Определённого жанра в опред. магазине
Route::get('book_shop/{id}/{id1}', 'HomeController@showBook1');
