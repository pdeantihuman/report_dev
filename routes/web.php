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

Route::resource('issues','IssuesController')
    ->only(['index','update','show'])->middleware('auth');

Route::post('issues/{issue}/undo','IssuesController@undo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
