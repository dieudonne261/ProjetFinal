<?php

namespace App\Http\Controllers;

use App\Models\Worked;
use App\Models\WorkedUser;
use Illuminate\Http\Request;

class WorkedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'responsable' => 'required',
            'description' => 'nullable',
            'idsemestre' => 'required',
        ]);

        $lastWorked = Worked::orderBy('IdWorked', 'desc')->first();
        $nextIdWorked = $lastWorked ? $lastWorked->IdWorked + 1 : 1;

        Worked::create([
            'IdWorked' => $nextIdWorked,
            'Nom' => $request->nom,
            'Responsable' => $request->responsable,
            'Description' => $request->description,
            'IdSemestre' => $request->idsemestre,
        ]);

        return redirect()->route('work-education')->with('success', 'Worked créé avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Responsable' => 'required|string|min:5|max:5',
            'IdSemestre' => 'required',
            'Description' => 'nullable|string',
            'workedUsers.*.Matricule' => 'required|string|max:255',
            'workedUsers.*.Note' => 'nullable|int|max:100',
        ]);

        $worked = Worked::findOrFail($id);
        $worked->update([
            'Nom' => $request->Nom,
            'Responsable' => $request->Responsable,
            'IdSemestre' => $request->IdSemestre,
            'Description' => $request->Description,
        ]);
        if (!(is_null($request->workedUsers))) {
            foreach ($request->workedUsers as $workedUserData) {

                $existingCount = WorkedUser::where('IdWorked', $worked->IdWorked)
                    ->where('Matricule', $workedUserData['Matricule'])
                    ->count();

                if ($existingCount >= 2) {
                    return redirect()->route('work-education')->withErrors(['Matricule existant, maximum deux répétitions autorisées.']);
                }

                $workedUser = WorkedUser::find($workedUserData['id']);
                if ($workedUser) {
                    $workedUser->update([
                        'Matricule' => $workedUserData['Matricule'],
                        'Note' => $workedUserData['Note'],
                    ]);
                } else {
                    WorkedUser::create([
                        'IdWorked' => $worked->IdWorked,
                        'Matricule' => $workedUserData['Matricule'],
                        'Note' => $workedUserData['Note'],
                    ]);
                }
            }
        }


        return redirect()->route('work-education')->with('success', 'worked et utilisateurs mis à jour avec succès.');
    }
}
