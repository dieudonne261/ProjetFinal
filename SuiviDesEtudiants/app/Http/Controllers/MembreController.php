<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\MembreUser;

class MembreController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'debut' => 'required|date',
            'fin' => 'nullable|date',
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


    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Debut' => 'nullable|date',
            'Fin' => 'nullable|date|after:Debut',
            'membreUsers.*.Matricule' => 'required|string|max:255',
            'membreUsers.*.Role' => 'required|string|max:255',
            'membreUsers.*.DateAjout' => 'required|date',
            'membreUsers.*.DateRetire' => 'nullable|date',
        ]);

        $membre = Membre::findOrFail($id);
        $membre->update([
            'Nom' => $request->Nom,
            'Description' => $request->Description,
            'Debut' => $request->Debut,
            'Fin' => $request->Fin,
        ]);

        if (!(is_null($request->membreUsers))) {
            foreach ($request->membreUsers as $membreUserData) {
                $membreUser = MembreUser::find($membreUserData['id']);
                if ($membreUser) {
                    $membreUser->update([
                        'Matricule' => $membreUserData['Matricule'],
                        'Role' => $membreUserData['Role'],
                        'DateAjout' => $membreUserData['DateAjout'],
                        'DateRetire' => $membreUserData['DateRetire'],
                    ]);
                } else {
                    MembreUser::create([
                        'IdMembres' => $membre->IdMembres,
                        'Matricule' => $membreUserData['Matricule'],
                        'Role' => $membreUserData['Role'],
                        'DateAjout' => $membreUserData['DateAjout'],
                        'DateRetire' => $membreUserData['DateRetire'],
                    ]);
                }
            }
        }


        return redirect()->route('membres')->with('success', 'Membre et utilisateurs mis à jour avec succès.');
    }
}
