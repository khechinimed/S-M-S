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

Route::middleware('auth:api')->get('/class', function (Request $request) {
    return $request->class();
});

Route::apiResources(['user'=> 'API\UserController']);
Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');

Route::apiResources(['class'=> 'API\ClassController']);
Route::get('findClass', 'API\ClassController@search');