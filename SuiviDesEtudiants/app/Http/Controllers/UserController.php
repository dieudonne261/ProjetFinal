<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('gestion-des-utilisateurs', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|min:5|max:5|unique:users,Matricule',
            'role' => 'required',
            'email' => 'required|email|unique:users,Email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'matricule' => $request->matricule,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('gestion-des-utilisateurs')->with('success', 'Utilisateur enregistré avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matricule' => 'required|string|min:5|max:5|unique:users,Matricule,' . $id,
            'role' => 'required',
            'email' => 'required|email|unique:users,Email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'Matricule' => $request->matricule,
            'role' => $request->role,
            'Email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('gestion-des-utilisateurs')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('gestion-des-utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
