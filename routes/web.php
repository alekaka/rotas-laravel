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
    return '<h1>LARAVEL</h1>';
});

Route::get('/ola', function () {
    return '<h1>Seja bem vindo!!</h1>';
});

Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});
