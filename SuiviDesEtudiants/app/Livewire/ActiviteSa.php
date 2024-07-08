<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Activité-SA')] 
class ActiviteSa extends Component
{
    public function render()
    {
        return view('livewire.activite-sa');
    }
}
