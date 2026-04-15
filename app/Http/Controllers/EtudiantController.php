<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Affiche la liste des étudiants.
     */
    public function index()
    {
        $etudiants = Etudiant::with('filiere')->get();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel étudiant.
     */
    public function create()
    {
        $filieres = Filiere::all(); // Récupère les parents pour le menu déroulant
        return view('etudiants.create', compact('filieres'));
    }

    /**
     * Enregistre un nouvel étudiant dans la base de données.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email',
            'tel' => 'required|string|max:20',
            'niveau_etude' => 'required|string',
            'date_naissance' => 'required|date',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Etudiant::create($validatedData);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès !');
    }

    /**
     * Affiche les détails d'un étudiant spécifique.
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Affiche le formulaire de modification d'un étudiant.
     */
    public function edit(Etudiant $etudiant)
    {
        $filieres = Filiere::all();
        return view('etudiants.edit', compact('etudiant', 'filieres'));
    }

    /**
     * Met à jour les informations d'un étudiant spécifié.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $etudiant->id,
            'tel' => 'required|string|max:20',
            'niveau_etude' => 'required|string',
            'date_naissance' => 'required|date',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $etudiant->update($validatedData);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès !');
    }

    /**
     * Supprime un étudiant de la base de données.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès !');
    }
}
