<?php

use Illuminate\Http\Request;

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

// Grupo de rotas
Route::prefix('app')->group(function() {
    Route::get("/", function() {
        return "Pagina principal do App";
    });

    Route::get("profile", function() {
        return "Pagina Profile";
    });

    Route::get("about", function() {
        return "Meu about";
    });
});

// Redirecionamento de rotas
Route::get('/aqui', function() {
    return redirect()->route('/ola');
}); 

// Rota com view
Route::get('/hello', function() {
    return view('hello');
});

// Rota com view
Route::get('/viewonome/{nome}/{sobrenome}', function($nome, $sobrenome) {
    return view('hellonome', ['nome' => $nome, 'sobrenome' => $sobrenome]);
});

// Rota return
Route::get('/rest/hello', function() {
    return "Hello (GET)";
});

// Rota post
Route::post('/rest/hello', function() {
    return "Hello (POST)";
});

// Rota delete
Route::delete('/rest/hello', function() {
    return "Hello (DELETE)";
});

// Rota put
Route::put('/rest/hello', function() {
    return "Hello (PUT)";
});

// Rota patch
Route::patch('/rest/hello', function() {
    return "Hello (PATCH)";
});

// Rota options
Route::options('/rest/hello', function() {
    return "Hello (OPTIONS)";
});

Route::post('/rest/imprimir', function(Request $req) {
    $nome = $req->input('nome');
    $idade = $req->input('idade');
    return "Hello $nome idade: $idade (POST)";
});

// Route rest limitado get, post
Route::match(['get', 'post'], '/rest/hello2', function () {
    return "Hello Word 2";
});

// Route rest com todos os metodos http 
Route::any('/rest/hello3', function () {
    return "Hello Word 3";
});

// Route adicionando um nome
Route::get('/produtos', function () {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressao</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

// Route usando o nome da rota
Route::get('/linkprodutos', function () {
    $url = route('meusprodutos');
    echo "<a href=\"".$url."\">Meus produtos</a>";
});

// Route redirecionamento
Route::get('/redirecionarprodutos', function () {
    return redirect()->route('meusprodutos');
});