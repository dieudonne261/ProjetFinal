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
            'description' => 'nullable',
            'debut' => 'required|date',
            'fin' => 'nullable|date',
        ]);

        if (strtotime($request->debut) >= strtotime($request->fin ) && !is_null($request->fin) ) {
            return redirect()->route('gestion-des-roles')->withErrors(['La date de début doit être antérieure à la date de fin.']);
        }

        $personne = Personne::where('student_id', $request->matricule)->first();

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'Matricule' => 'required',
            'NomResponsabilite' => 'required',
            'Description' => 'nullable',
            'Debut' => 'required|date',
            'Fin' => 'nullable|date',
        ]);

        $personne = Personne::where('student_id', $request->Matricule)->first();

        if (!$personne) {
            return redirect()->route('gestion-des-roles')->withErrors(['Matricule non trouvé.']);
        }

        $roles = Role::findOrFail($id);
        $roles->update([
            'Matricule' => $request->Matricule,
            'NomResponsabilite' => $request->NomResponsabilite,
            'Description' => $request->Description,
            'Debut' => $request->Debut,
            'Fin' => $request->Fin,
        ]);

        return redirect()->route('gestion-des-roles')->with('success', 'Role mis à jour avec succès.');
    }

}
