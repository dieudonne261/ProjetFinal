<?php

namespace App\Http\Controllers;


use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActiviteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'Type' => 'required|string',
            'Responsable' => 'required|string',
            'Cible' => 'required|string',
            'Description' => 'nullable|string',
            'Rapportfilepath' => 'nullable|file|mimes:pdf|max:2048',
            'DateDebut' => 'required|date',
            'DateFin' => 'nullable|date',
        ]);

        $lastAct = Activite::orderBy('idActivite', 'desc')->first();
        $nextidAct = $lastAct ? $lastAct->idActivite + 1 : 1;


        $rapportFilePath = null;
        if ($request->hasFile('Rapportfilepath')) {
            $file = $request->file('Rapportfilepath');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('assets/reports', $fileName, 'public');
            $rapportFilePath = 'storage/' . $filePath;
        }


        Activite::create([
            'idActivite' => $nextidAct,
            'Type' => $request->Type,
            'Responsable' => $request->Responsable,
            'Cible' => $request->Cible,
            'Description' => $request->Description,
            'Rapportfilepath' => $rapportFilePath,
            'DateDebut' => $request->DateDebut,
            'DateFin' => $request->DateFin,
        ]);

        if ($request->Type === 'Université') {
            return redirect()->route('activite-universite')->with('success', 'Activité Universitaire créée avec succès.');
        } elseif ($request->Type === 'SA') {
            return redirect()->route('activite-sa')->with('success', 'Activité de SA créée avec succès.');
        } else {
            return redirect()->route('activite-autres')->with('success', 'Activité créée avec succès.');
        };
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Type' => 'required|string',
            'Responsable' => 'required|string',
            'Cible' => 'required|string',
            'Description' => 'nullable|string',
            'Rapportfilepath' => 'nullable|file|mimes:pdf|max:2048',
            'DateDebut' => 'required|date',
            'DateFin' => 'nullable|date|after_or_equal:DateDebut',
        ]);

        $activite = Activite::findOrFail($id);

        $activite->Type = $request->Type;
        $activite->Responsable = $request->Responsable;
        $activite->Cible = $request->Cible;
        $activite->Description = $request->Description;
        $activite->DateDebut = $request->DateDebut;
        $activite->DateFin = $request->DateFin;

        if ($request->hasFile('Rapportfilepath')) {
            $file = $request->file('Rapportfilepath');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('rapports', $filename, 'public');

            $activite->Rapportfilepath = '/storage/' . $filePath;
        }
        

        $activite->save();

        if ($request->Type === 'Université') {
            return redirect()->route('activite-universite')->with('success', 'Activité Universitaire modifiée avec succès.');
        } elseif ($request->Type === 'SA') {
            return redirect()->route('activite-sa')->with('success', 'Activité de SA modifiée avec succès.');
        } else {
            return redirect()->route('activite-autres')->with('success', 'Activité modifiée avec succès.');
        };
    }
}
