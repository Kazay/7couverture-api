<?php

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', function () use ($router) {
  return $router->app->version();
});

// API routes
$router->group(['prefix' => 'api'], function () use ($router)
{
  // Categories routes
  $router->get('categories',  ['uses' => 'CategoryController@showAll']);
  $router->get('categories/{id:[0-9]+}', ['uses' => 'CategoryController@showOne']);
  $router->post('categories', ['uses' => 'CategoryController@create']);
  $router->delete('categories/{id:[0-9]+}', ['uses' => 'CategoryController@delete']);
  $router->put('categories/{id:[0-9]+}', ['uses' => 'CategoryController@update']);

  // Tags routes
  $router->get('tags',  ['uses' => 'TagController@showAll']);
  $router->get('tags/{id:[0-9]+}', ['uses' => 'TagController@showOne']);
  $router->post('tags', ['uses' => 'TagController@create']);
  $router->delete('tags/{id:[0-9]+}', ['uses' => 'TagController@delete']);
  $router->put('tags/{id:[0-9]+}', ['uses' => 'TagController@update']);

  // Roles routes
  $router->get('roles',  ['uses' => 'RoleController@showAll']);
  $router->get('roles/{id:[0-9]+}', ['uses' => 'RoleController@showOne']);
  $router->post('roles', ['uses' => 'RoleController@create']);
  $router->delete('roles/{id:[0-9]+}', ['uses' => 'RoleController@delete']);
  $router->put('roles/{id:[0-9]+}', ['uses' => 'RoleController@update']);

  // Users routes
  $router->get('users',  ['uses' => 'UserController@showAll']);
  $router->get('users/{id:[0-9]+}', ['uses' => 'UserController@showOne']);
  $router->post('users', ['uses' => 'UserController@create']);
  $router->delete('users/{id:[0-9]+}', ['uses' => 'UserController@delete']);
  $router->put('users/{id:[0-9]+}', ['uses' => 'UserController@update']);

  // Posts routes
  $router->get('posts',  ['uses' => 'PostController@showAll']);
  $router->get('posts/{id:[0-9]+}', ['uses' => 'PostController@showOne']);
  $router->post('posts', ['uses' => 'PostController@create']);
  $router->delete('posts/{id:[0-9]+}', ['uses' => 'PostController@delete']);
  $router->put('posts/{id:[0-9]+}', ['uses' => 'PostController@update']);

  // Comments routes
  $router->get('comments',  ['uses' => 'CommentController@showAll']);
  $router->get('comments/{id:[0-9]+}', ['uses' => 'CommentController@showOne']);
  $router->post('comments', ['uses' => 'CommentController@create']);
  $router->delete('comments/{id:[0-9]+}', ['uses' => 'CommentController@delete']);
  $router->put('comments/{id:[0-9]+}', ['uses' => 'CommentController@update']);
});