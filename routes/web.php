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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('issues', 'IssuesController')
    ->only(['create', 'store']);

Route::resource('issues', 'IssuesController')
    ->only(['index', 'update', 'show'])->middleware('auth');

Route::post('issues/{issue}/undo', 'IssuesController@undo');
Route::get('issues/home/success', 'IssuesController@home');

Auth::routes();

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showResetForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('configuration', function () {
        return view('admin.configuration');
    })->middleware('auth');

});

Route::prefix('api/environment')->group(function () {
    Route::patch('/', 'EnvrionmentController@update');
    Route::get('/', 'EnvrionmentController@index');
});

Route::get('api/issues', 'API\IssuesController@index');

Route::patch('api/user/configuration/alley', 'API\UserController@setAlley');
Route::get('api/user/configuration/user', 'API\UserController@getUser');
Route::get('api/user', 'API\UserController@getUser');
Route::patch('api/user/configuration/openid', 'API\UserController@setOpenid');