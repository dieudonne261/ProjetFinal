<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personne;
use App\Models\Suivi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('UAZ - Suivi')]
class SuiviDesEtudiants extends Component
{
    public $matricule;
    public $matriculeCreateur;
    public $matriculeCible;
    public $types;
    public $description;
    public $dateSuivi;
    public $suivis;
    public $suiviIdToUpdate;

    public function saveSuivi()
    {
        return $this->redirectRoute('profil');

        $this->validate([
            'matriculeCible' => 'required',
            'types' => 'required',
            'description' => 'required',
            'dateSuivi' => 'required|date',
        ]);

        $personne = Personne::where('Matricule', $this->matriculeCible)->first();

        if (!$personne) {
            return $this->redirectRoute('suivi-des-etudiants');
        }

        Suivi::create([
            'MatriculeCible' => $this->matriculeCible,
            'Types' => $this->types,
            'Description' => $this->description,
            'DateSuivi' => $this->dateSuivi,
            'MatriculeAdd' => $this->matriculeCreateur,
        ]);

        $this->reset(['matriculeCible', 'types', 'dateSuivi', 'description']);
        return $this->redirectRoute('suivi-des-etudiants');
    }

    public function mount()
    {
        $this->suivis = Suivi::all();
        $this->matriculeCreateur = Auth::user()->Matricule;
    }

    public function deleteSuivi($suiviId)
    {
        return $this->redirectRoute('profil');
        $suivi = Suivi::findOrFail($suiviId);
        $suivi->delete();
        $this->suivis = Suivi::all();
    }

    public function updateSuivi()
    {

        return $this->redirectRoute('dashboard');
        $this->validate([
            'matriculeCible' => 'required',
            'types' => 'required',
            'description' => 'required',
            'dateSuivi' => 'required|date',
        ]);

        $suivi = Suivi::findOrFail($this->suiviIdToUpdate);
        $suivi->update([
            'MatriculeCible' => $this->matriculeCible,
            'Types' => $this->types,
            'Description' => $this->description,
            'DateSuivi' => $this->dateSuivi,
        ]);

        $this->reset(['matriculeCible', 'types', 'dateSuivi', 'description', 'suiviIdToUpdate']);
        $this->suivis = Suivi::all();
    }

    public function render()
    {
        return view('livewire.suivi-des-etudiants');
    }
}