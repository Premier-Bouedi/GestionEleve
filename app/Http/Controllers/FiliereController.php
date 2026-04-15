<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Affiche la liste des filières.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle filière.
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Enregistre une nouvelle filière dans la base de données.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_filiere' => 'required|string|max:255',
            'niveau_education' => 'required|string|max:255',
        ]);

        Filiere::create($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière créée avec succès !');
    }

    /**
     * Affiche les détails d'une filière spécifique et ses étudiants.
     */
    public function show(Filiere $filiere)
    {
        $filiere->load('etudiants');
        return view('filieres.show', compact('filiere'));
    }

    /**
     * Affiche le formulaire de modification d'une filière.
     */
    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    /**
     * Met à jour les informations d'une filière spécifiée.
     */
    public function update(Request $request, Filiere $filiere)
    {
        $validatedData = $request->validate([
            'nom_filiere' => 'required|string|max:255',
            'niveau_education' => 'required|string|max:255',
        ]);

        $filiere->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière mise à jour avec succès !');
    }

    /**
     * Supprime une filière de la base de données.
s     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index')->with('success', 'Filière supprimée avec succès !');
    }
}
