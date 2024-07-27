<?php

namespace App\Livewire;
use App\Models\Role;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('UAZ - Roles')] 
class GestionDesRoles extends Component
{
    public $roles;

    public function mount() {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.gestion-des-roles');
    }
}
