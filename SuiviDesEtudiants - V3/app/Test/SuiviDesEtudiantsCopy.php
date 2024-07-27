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
    public $matriculeCible;
    public $matriculeCreateur;
    public $types;
    public $dateSuivi;
    public $description;
    public $isValidMatriculeCible = false;
    public $showSaveButton = false;

    public function mount()
    {
        $this->matriculeCreateur = Auth::user()->Matricule;
    }

    public function validateMatricule()
    {
        $personne = Personne::where('Matricule', $this->matriculeCible)->first();
        $this->isValidMatriculeCible = $personne ? true : false;
        $this->showSaveButton = $this->isValidMatriculeCible;
    }

    public function save()
    {
        Suivi::create([
            'IdSuivi' => uniqid(),
            'MatriculeCible' => $this->matriculeCible,
            'Types' => $this->types,
            'Description' => $this->description,
            'DateSuivi' => $this->dateSuivi,
            'MatriculeAdd' => $this->matriculeCreateur,
        ]);

        session()->flash('message', 'Suivi enregistré avec succès.');
        $this->reset(['matriculeCible', 'types', 'dateSuivi', 'description', 'isValidMatriculeCible', 'showSaveButton']);
    }

    public function render()
    {
        return view('livewire.suivi-des-etudiants');
    }
}