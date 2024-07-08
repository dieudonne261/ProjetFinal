<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'nomresponsabilite' => 'required',
            'description' => 'required',
            'debut' => 'required|date',
            'fin' => 'required|date',
        ]);

        if (strtotime($request->debut) >= strtotime($request->fin)) {
            return redirect()->route('gestion-des-roles')->withErrors(['La date de début doit être antérieure à la date de fin.']);
        }

        $personne = Personne::where('Matricule', $request->matricule)->first();

        if (!$personne) {
            return redirect()->route('gestion-des-roles')->withErrors(['Matricule non trouvé.']);
        }

        Role::create([
            'Matricule' => $request->matricule,
            'NomResponsabilite' => $request->nomresponsabilite,
            'Description' => $request->description,
            'Debut' => $request->debut,
            'Fin' => $request->fin,
        ]);

        return redirect()->route('gestion-des-roles')->with('success', 'Roles enregistré avec succès.');
    }

}
