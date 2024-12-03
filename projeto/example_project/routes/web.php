<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $nome = 'Arthur';
//     $idade = 26;

//     $someArray = [1, 2, 3, 4, 5];

//     $someNames = ['Josias', 'Maria', 'Caetano', 'Luis'];

//     return view('welcome', ['nome' => $nome, 'idade' => $idade, 'someArray' => $someArray, 'someNames' => $someNames]);
// });



// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/produtos/{id}', function ($id) {

//     $busca = request('search'); // ex: ?search=Pedro

//     return view('produtos', ['id' => $id, 'busca' => $busca]);
// });


// Route::get('/produtos_teste/{id?}', function ($id = null) {
//     return view('produtos', ['id' => $id]);
// });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/eventos', [EventController::class, 'index']);
Route::get('/eventos/criar', [EventController::class, 'create']);
Route::get('/eventos/{id}', [EventController::class, 'show']);
Route::get('/eventos/{id}/editar', [EventController::class, 'edit']);
Route::post('/eventos', [EventController::class, 'store']);
Route::put('/eventos/{id}', [EventController::class, 'update']);
Route::delete('/eventos/{id}', [EventController::class, 'destroy']);
