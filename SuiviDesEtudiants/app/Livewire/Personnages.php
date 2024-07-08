<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Personne;
use Livewire\Attributes\Title;



#[Title('UAZ - Personnages')] 
class Personnages extends Component
{
    public $personnes;

    public function mount() {
        $this->personnes = Personne::all();
    }

    public function render() {
        return view('livewire.personnages');
    }
}
