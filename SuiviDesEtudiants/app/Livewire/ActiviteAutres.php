<?php

namespace App\Livewire;

use App\Models\Activite;
use App\Models\Membre;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Activité-Autres')] 
class ActiviteAutres extends Component
{
    public $activites;
    public $membres;

    public function mount() {
        $this->activites = Activite::whereNotIn('Type', ['Université', 'SA'])->get();
        $this->membres = Membre::all();
    }
    public function render()
    {
        return view('livewire.activite-autres');
    }
}
