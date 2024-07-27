<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personne;
use App\Models\Suivi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('UAZ - Profil')] 

class Profil extends Component
{
    public $suivis;
    public $personnes;
    public $matriculeProfil;
    public $user;
    public $personne;
    public $matriculeCibleCount;
    public $matriculeAddCount;

    public function mount() {
        $this->user = Auth::user();

        if ($this->user) {
            $this->personne = Personne::where('Matricule', $this->user->Matricule)->first();
            if ($this->personne) {
                $this->matriculeCibleCount = Suivi::where('MatriculeCible', $this->personne->Matricule)->count();
                $this->matriculeAddCount = Suivi::where('MatriculeAdd', $this->personne->Matricule)->count();
            }
        }
    }
    public function render()
    {
        return view('livewire.profil');
    }
}
