<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email', 'tel', 
        'niveau_etude', 'date_naissance', 'filiere_id'
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
