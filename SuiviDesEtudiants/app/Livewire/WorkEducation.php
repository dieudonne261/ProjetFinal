<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('UAZ - Work-Ed')] 
class WorkEducation extends Component
{
    public function render()
    {
        return view('livewire.work-education');
    }
}
