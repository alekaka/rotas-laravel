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

// Rota com return
Route::get('/', function () {
    return '<h1>LARAVEL</h1>';
});

// Rota com return
Route::get('/ola', function () {
    return '<h1>Seja bem vindo!!</h1>';
});

// Rota com view
Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});

// Passar parâmetros
Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "<h1>Ola, $nome $sobrenome</h1>";
});

// Passar parâmetros
Route::get('/repetir/{nome}/{n}', function ($nome, $n) {
    if (is_integer($n)) 
    {
        for ($i = 0; $i < $n; $i++) 
        {
            echo "<h1>Ola, $nome</h1>";
        }
    }
    else 
        echo "Voce nao digitou um inteiro";
});

// Restringir parâmetros com expressões regulares
Route::get('/seunomecomregra/{nome}/{n}', function ($nome, $n) {
    for ($i = 0; $i < $n; $i++) 
    {
        echo "<h1>Ola, $nome</h1>";
    }
})->where('n', '[0-9]+')->where('nome','[A-Za-z]+');

// Passar parâmetros opcional
Route::get('/seunomesemregra/{nome?}', function ($nome = null) {
    if (isset($nome))
    {
        echo "<h1>Ola, $nome</h1>";
    }  
    else 
    {
        echo "Voce nao passou nenhum nome";
    } 
});