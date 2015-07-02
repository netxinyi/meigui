<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){

    return Response::make('welcome');
});


/*
|--------------------------------------------------------------------------
| Auth支持-控制器路由
|--------------------------------------------------------------------------
|
*/
Route::controllers([

    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);