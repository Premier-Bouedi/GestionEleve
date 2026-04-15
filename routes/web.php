<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// CETTE LIGNE DOIT ÊTRE BIEN DISTINCTE ET À L'EXTÉRIEUR
Route::resource('eleves', EleveController::class)->parameters([
    'eleves' => 'eleve'
]);

Route::resource('etudiants', EtudiantController::class);
Route::resource('filieres', FiliereController::class);