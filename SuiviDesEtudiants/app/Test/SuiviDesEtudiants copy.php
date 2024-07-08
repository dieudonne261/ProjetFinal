<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Response;
use App\Models\Personne;
use App\Models\Suivi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

#[Title('UAZ - Suivi')] 
class SuiviDesEtudiants extends Component
{
    public $matricule;
    public $matriculeCreateur;
    public $matriculeCible;
    public $types;
    public $description;
    public $dateSuivi;

    public function saveSuivi()
    {
        $this->validate([
            'matriculeCible' => 'required',
            'types' => 'required',
            'description' => 'required',
            'dateSuivi' => 'required|date',
        ]);

        $personne = Personne::where('Matricule', $this->matriculeCible)->first();

        if (!$personne) {

            return $this->redirectRoute('suivi-des-etudiants', navigate: true);
            
            //return Response::json(['message' => 'Matricule non trouvé.'], 422);
        }

        Suivi::create([
            'MatriculeCible' => $this->matriculeCible,
            'Types' => $this->types,
            'Description' => $this->description,
            'DateSuivi' => $this->dateSuivi,
            'MatriculeAdd' => $this->matriculeCreateur,
        ]);
        $this->reset(['matriculeCible', 'types', 'dateSuivi', 'description','matriculeCreateur']);
        return $this->redirectRoute('suivi-des-etudiants', navigate: true);
        //return Response::json(['message' => 'Suivi enregistré avec succès.']);
    }

    public function getImagePath($matricule)
    {
        $imagePath = "assets/images/users/{$matricule}.jpg";
        return Storage::exists($imagePath) ? $imagePath : 'assets/images/users/default.jpg';
    }

    public $suivis;
    public function mount()
    {
        $this->suivis = Suivi::all();
        $this->matriculeCreateur = Auth::user()->Matricule;
    }



    public function deleteSuivi($suiviId)
    {
        $suivi = Suivi::findOrFail($suiviId);
        $suivi->delete();
        $this->suivis = Suivi::all(); // Rafraîchir la liste des suivis après suppression
    }

    // Méthode pour mettre à jour un suivi
    public function updateSuivi($suiviId)
    {
        $suivi = Suivi::findOrFail($suiviId);
        $suivi->update([
            'MatriculeCible' => $this->matriculecible,
            'Description' => $this->description,
            'DateSuivi' => $this->dateSuivi,
        ]);
        $this->reset(['matriculecible','description', 'dateSuivi']); // Réinitialiser les valeurs après mise à jour
        $this->suivis = Suivi::all(); // Rafraîchir la liste des suivis après mise à jour
    }



    public function render()
    {
        return view('livewire.suivi-des-etudiants');
    }

    
}
