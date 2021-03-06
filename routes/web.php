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

$router->get('/', 'CitiesController@index');

//read
$router->get('/posts', 'PostsController@index');
//post
$router->post('/posts', 'PostsController@store');
//read by id
$router->get('/posts/{id}', 'PostsController@show');
//update
$router->put('/posts/{id}', 'PostsController@update');
//delete
$router->delete('/posts/{id}', 'PostsController@destroy');

//---> batas antar route api <---//

//read
$router->get('/cities', 'CitiesController@index');
//post
$router->post('/cities', 'CitiesController@store');
//read by id
$router->get('/cities/{id}', 'CitiesController@show');
//update
$router->put('/cities/{id}', 'CitiesController@update');
//delete
$router->delete('/cities/{id}', 'CitiesController@destroy');