<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['nom_filiere', 'niveau_education'];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
