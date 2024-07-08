<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Activité-Université')] 
class ActiviteUniversite extends Component
{
    public function render()
    {
        return view('livewire.activite-universite');
    }
}
