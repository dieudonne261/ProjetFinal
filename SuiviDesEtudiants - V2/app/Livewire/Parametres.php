<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\EtatSemestre;

#[Title('UAZ - Paramètres')] 
class Parametres extends Component
{
    public $semestres;

    public function mount() {
        $this->semestres = EtatSemestre::all();
    }

    public function render()
    {
        return view('livewire.parametres');
    }
}
