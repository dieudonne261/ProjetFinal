<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Personne;

class ProfileHeader extends Component
{
    public $user;
    public $personne;
    public $title;

    public function mount() {
        $this->user = Auth::user();
        if ($this->user) {
            $this->personne = Personne::where('student_id', $this->user->Matricule)->first();
            if (in_array($this->personne->sex, ['M', 'Masculin', '1'])) {
                $this->title = 'Monsieur';
            } else {
                $this->title = 'Madame';
            }
        }
    }

    public function render() {
        return view('livewire.profile-header');
    }
}
