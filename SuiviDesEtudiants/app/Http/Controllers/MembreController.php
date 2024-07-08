<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;

class MembreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'debut' => 'required|date',
            'fin' => 'date|after:Debut',
        ]);

        $lastMembre = Membre::orderBy('IdMembres', 'desc')->first();
        $nextIdMembres = $lastMembre ? $lastMembre->IdMembres + 1 : 1;

        Membre::create([
            'IdMembres' => $nextIdMembres,
            'Nom' => $request->nom,
            'Description' => $request->description,
            'Debut' => $request->debut,
            'Fin' => $request->fin,
        ]);

        return redirect()->route('membres')->with('success', 'Membre créé avec succès.');
    }
}
