<?php

namespace App\Livewire;

use App\Models\Activite;
use App\Models\Membre;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Activité-Université')] 
class ActiviteUniversite extends Component
{
    public $activites;
    public $membres;

    public function mount() {
        $this->activites = Activite::where('Type', 'Université')->get();
        $this->membres = Membre::all();
    }
    public function render()
    {
        return view('livewire.activite-universite');
    }
}
