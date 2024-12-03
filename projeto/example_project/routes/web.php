<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $nome = 'Arthur';
    $idade = 26;

    $someArray = [1, 2, 3, 4, 5];

    $someNames = ['Josias', 'Maria', 'Caetano', 'Luis'];

    return view('welcome', ['nome' => $nome, 'idade' => $idade, 'someArray' => $someArray, 'someNames' => $someNames]);
});



Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos/{id}', function ($id) {

    $busca = request('search'); // ex: ?search=Pedro

    return view('produtos', ['id' => $id, 'busca' => $busca]);
});


Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('produtos', ['id' => $id]);
});
