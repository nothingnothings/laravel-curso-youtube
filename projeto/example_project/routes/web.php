<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $nome = 'Arthur';
    $idade = 26;

    return view('welcome', ['nome' => $nome, 'idade' => $idade]);
});
