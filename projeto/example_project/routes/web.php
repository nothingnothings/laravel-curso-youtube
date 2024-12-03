<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $nome = 'Arthur';
    $idade = 26;

    $someArray = [1, 2, 3, 4, 5];

    $someNames = ['Josias', 'Maria', 'Caetano', 'Luis'];

    return view('welcome', ['nome' => $nome, 'idade' => $idade, 'someArray' => $someArray, 'someNames' => $someNames]);
});
