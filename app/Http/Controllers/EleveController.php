<?php

namespace App\Http\Controllers;

use App\Models\Eleve; 
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Affiche la liste des élèves.
     */
    public function index()
    {
        $eleves = Eleve::all();
        return view('eleves.index', compact('eleves'));
    }

    /**
     * Affiche le formulaire de création d'un élève.
     */
    public function create()
    {
        return view('eleves.create');
    }

    /**
     * Enregistre un nouvel élève dans la base de données.
     */
    public function store(Request $request)
    {
        // 1. Validation des données (sécurité)
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:eleves,email',
            'age' => 'nullable|integer|min:1',
        ]);

        // 2. Création de l'élève en base de données
        Eleve::create($request->all());

        // 3. Redirection vers la liste avec un petit message de succès
        return redirect()->route('eleves.index')->with('success', 'Élève ajouté avec succès !');
    }

    // Afficher le formulaire de modification
    public function edit(Eleve $eleve)
    {
        return view('eleves.edit', compact('eleve'));
    }

    // Enregistrer les modifications
    public function update(Request $request, Eleve $eleve)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:eleves,email,'.$eleve->id,
        ]);

        $eleve->update($request->all());
        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour !');
    }

    // Supprimer l'élève
    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return redirect()->route('eleves.index')->with('success', 'Élève supprimé !');
    }
}