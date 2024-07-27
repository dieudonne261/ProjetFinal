<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use App\Models\Suivi;
use Illuminate\Support\Facades\Auth;

class SuiviController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'matriculeCible' => 'required',
            'types' => 'required',
            'description' => 'nullable|string',
            'dateSuivi' => 'required|date',
        ]);

        $personne = Personne::where('student_id', $request->matriculeCible)->first();

        if (!$personne) {
            return redirect()->route('suivi-des-etudiants')->withErrors(['Matricule non trouvé.']);
        }

        Suivi::create([
            'MatriculeCible' => $request->matriculeCible,
            'Types' => $request->types,
            'Description' => $request->description,
            'DateSuivi' => $request->dateSuivi,
            'MatriculeAdd' => Auth::user()->Matricule,
        ]);

        return redirect()->route('suivi-des-etudiants')->with('success', 'Suivi enregistré avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matriculeCible' => 'required',
            'types' => 'required',
            'description' => 'nullable',
            'dateSuivi' => 'required|date',
        ]);

        $personne = Personne::where('student_id', $request->matriculeCible)->first();

        if (!$personne) {
            return redirect()->route('suivi-des-etudiants')->withErrors(['Matricule non trouvé.']);
        }
        
        $suivi = Suivi::findOrFail($id);
        $suivi->update([
            'MatriculeCible' => $request->matriculeCible,
            'Types' => $request->types,
            'Description' => $request->description,
            'DateSuivi' => $request->dateSuivi,
        ]);

        return redirect()->route('suivi-des-etudiants')->with('success', 'Suivi mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $suivi = Suivi::findOrFail($id);
        $suivi->delete();

        return redirect()->route('suivi-des-etudiants')->with('success', 'Suivi supprimé avec succès.');
    }
}
