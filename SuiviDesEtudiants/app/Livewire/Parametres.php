<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Paramètres')] 
class Parametres extends Component
{
    public function render()
    {
        return view('livewire.parametres');
    }
}
