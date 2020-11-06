<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('books', 'BooksController@index');
$router->get('/books/{id}', 'BooksController@berdasarID');
$router->post('books', 'BooksController@store');
$router->put('books/{id}', 'BooksController@update');
$router->delete('books/{id}', 'BooksController@destroy');

$router->get('authors', 'AuthorController@index');
$router->get('/authors/{id}', 'AuthorController@berdasarID');
$router->post('authors', 'AuthorController@store');
$router->put('authors/{id}', 'AuthorController@update');
$router->delete('authors/{id}', 'AuthorController@destroy');
