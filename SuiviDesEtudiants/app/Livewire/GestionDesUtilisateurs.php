<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Users')] 
class GestionDesUtilisateurs extends Component
{
    public $users;

    public function mount() {
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.gestion-des-utilisateurs');
    }
}
