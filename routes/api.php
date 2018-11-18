<?php

$api = app('Dingo\Api\Routing\Router');

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

$api->version('v1', function($api){
    // metadata
    $namespace = 'App\Http\Controllers\\';
    // routes
    $api->patch('environment', $namespace.'EnvrionmentController@update');
    $api->get('environment', $namespace.'EnvrionmentController@index');
});

$api->version('v1', function($api) {
    // metadata
    $namespace = 'App\Http\Controllers\API\\';
    // routes
    $api->get('issues', $namespace.'IssuesController@index');
});

$api->version('v1', function($api) {
    // metadata
    $namespace = 'App\Http\Controllers\API\\';
    $prefix = 'user/configuration/';
    // routes
    $api->patch($prefix.'alley', $namespace.'UserController@setAlley');
    $api->get($prefix.'user', $namespace.'UserController@getUser');
});
