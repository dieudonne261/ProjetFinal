<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Membre;
use App\Models\MembreUser;

#[Title('UAZ - Membres')] 
class Membres extends Component
{
    public $membres;

    public function mount() {
        $this->membres = Membre::with('membreUsers')->get();
    }
    
    public function render()
    {
        return view('livewire.membres');
    }
}
