<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/categories', 'App\Http\Controllers\CategoryController@getAll');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@getByCatId');
Route::post('/categories', 'App\Http\Controllers\CategoryController@create');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@delete');

Route::get('/tasks', 'App\Http\Controllers\TaskController@getAll');
Route::get('/tasks/{row_id}', 'App\Http\Controllers\TaskController@getByTaskId');
Route::get('/catTasks/{par_row_id}','App\Http\Controllers\TaskController@getTasksByCatId');
Route::post('/tasks', 'App\Http\Controllers\TaskController@create');
Route::delete('/tasks/{row_id}', 'App\Http\Controllers\TaskController@delete');
