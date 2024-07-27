<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtatSemestre;
use Illuminate\Support\Facades\Validator;

class OutilsController extends Controller
{
    public function storeEtatSemestre(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NomSemestre' => 'required|string|max:255',
            'DateDebut' => 'required|date',
            'DateFin' => 'required|date|after_or_equal:DateDebut',
        ]);

        $last = EtatSemestre::orderBy('IdSemestre', 'desc')->first();
        $nextId = $last ? $last->IdSemestre + 1 : 1;

        if ($validator->fails()) {
            return redirect()->route('parametres')->withErrors($validator)->withInput();
        }

        $existingSemestre = EtatSemestre::where(function ($query) use ($request) {
            $query->whereBetween('DateDebut', [$request->DateDebut, $request->DateFin])
                  ->orWhereBetween('DateFin', [$request->DateDebut, $request->DateFin])
                  ->orWhere(function ($query) use ($request) {
                      $query->where('DateDebut', '<=', $request->DateDebut)
                            ->where('DateFin', '>=', $request->DateFin);
                  });
        })->exists();

        if ($existingSemestre) {
            return redirect()->route('parametres')->withErrors(['DateDebut' => 'Les dates chevauchent une période existante.'])->withInput();
        }

        EtatSemestre::create([
            'IdSemestre' => $next,
            'NomSemestre' => $request->NomSemestre,
            'DateDebut' => $request->DateDebut,
            'DateFin' => $request->DateFin,
        ]);

        return redirect()->route('parametres')->with('success', 'Le semestre a été ajouté avec succès.');
    }

    public function updateEtatSemestre(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'NomSemestre' => 'required|string|max:255',
            'DateDebut' => 'required|date',
            'DateFin' => 'required|date|after_or_equal:DateDebut',
        ]);

        if ($validator->fails()) {
            return redirect()->route('parametres')->withErrors($validator)->withInput();
        }

        $existingSemestre = EtatSemestre::where(function ($query) use ($request, $id) {
            $query->where(function ($query) use ($request) {
                $query->whereBetween('DateDebut', [$request->DateDebut, $request->DateFin])
                    ->orWhereBetween('DateFin', [$request->DateDebut, $request->DateFin])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('DateDebut', '<=', $request->DateDebut)
                                ->where('DateFin', '>=', $request->DateFin);
                    });
            })
            ->where('id', '!=', $id);
        })->exists();

        if ($existingSemestre) {
            return redirect()->route('parametres')->withErrors(['DateDebut' => 'Les dates chevauchent une période existante.'])->withInput();
        }

        EtatSemestre::where('id', $id)->update([
            'NomSemestre' => $request->NomSemestre,
            'DateDebut' => $request->DateDebut,
            'DateFin' => $request->DateFin,
        ]);

        return redirect()->route('parametres')->with('success', 'Le semestre a été modifié avec succès.');
    }

}
