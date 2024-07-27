<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\EtatSemestre;
use App\Models\Worked;
use App\Models\WorkedUser;

#[Title('UAZ - Work-Ed')] 
class WorkEducation extends Component
{
    public $semestres;
    public $workeds;

    public function mount() {
        $this->semestres = EtatSemestre::all();
        $this->workeds = Worked::with('WorkedUsers')->get();
    }
    
    public function render()
    {
        return view('livewire.work-education');
    }
}
