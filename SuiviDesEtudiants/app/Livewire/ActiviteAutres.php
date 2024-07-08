<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Activité-Autres')] 
class ActiviteAutres extends Component
{
    public function render()
    {
        return view('livewire.activite-autres');
    }
}
