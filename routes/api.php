<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/authors', 'AuthorController@index');
Route::get('/authors/search', 'AuthorController@search');
Route::get('/authors/{author}', 'AuthorController@show');
Route::get('/authors/{author}/books', 'AuthorController@booksIndex');

Route::get('/books', 'BookController@index');
Route::get('/books/search', 'BookController@search');
Route::get('/books/{book}', 'BookController@show');
Route::get('/books/{book}/authors', 'BookController@authorsIndex');
Route::get('/books/{book}/genres', 'BookController@genresIndex');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/search', 'GenreController@search');
Route::get('/genres/{genre}', 'GenreController@show');
