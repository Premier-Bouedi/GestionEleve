<?php

use App\Http\Controllers\EleveController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// CETTE LIGNE DOIT ÊTRE BIEN DISTINCTE ET À L'EXTÉRIEUR
Route::resource('eleves', EleveController::class)->parameters([
    'eleves' => 'eleve'
]);