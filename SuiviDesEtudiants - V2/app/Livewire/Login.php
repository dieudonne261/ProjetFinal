<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

#[Title('UAZ - Login')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->flash('message', 'Connexion réussie');

            $user = Auth::user();

            if ($user->role == '3') {
                return $this->redirectRoute('profil', navigate: true);
            }

            return $this->redirectRoute('dashboard', navigate: true);
        }

        session()->flash('error', 'Utilisateur non trouvé!');
    }

    public function render()
    {
        return view('livewire.login');
    }
}