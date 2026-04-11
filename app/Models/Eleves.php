<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    // On définit les champs que l'on peut remplir via un formulaire
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'age',
    ];
}