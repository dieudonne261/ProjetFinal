<?php

namespace App\Livewire;

use Livewire\Component;

class NotAuthorized extends Component
{
    public function render()
    {
        return view('livewire.not-authorized');
    }
}
