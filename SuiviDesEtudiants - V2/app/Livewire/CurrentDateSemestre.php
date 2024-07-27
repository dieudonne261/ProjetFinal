<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EtatSemestre;
use Carbon\Carbon;

class CurrentDateSemestre extends Component
{
    public $currentDate;
    public $currentSemestre;

    public function mount() {
        // Définir la locale de Carbon en français
        Carbon::setLocale('fr');
        
        // Formater la date en français avec le mois en majuscule
        $this->currentDate = 'Le ' . Carbon::now()->isoFormat('DD MMMM YYYY');
        $today = Carbon::now()->toDateString();

        $semestre = EtatSemestre::where('DateDebut', '<=', $today)
                                ->where('DateFin', '>=', $today)
                                ->first();
        
        $this->currentSemestre = $semestre ? $semestre->NomSemestre : 'Pause Semestre';
    }

    public function render()
    {
        return view('livewire.current-date-semestre');
    }
}
