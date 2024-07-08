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

        // Récupérer les informations de la personne correspondant à l'utilisateur
        if ($this->user) {
            $this->personne = Personne::where('Matricule', $this->user->Matricule)->first();
            if ($this->personne) {
                $this->title = $this->personne->Sex == 'M' ? 'Monsieur' : 'Madame';
            }
        }
    }

    public function render() {
        return view('livewire.profile-header');
    }
}
