<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personne;
use App\Models\Suivi;
use App\Models\EtatSemestre;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('UAZ - Profil')] 

class Profil extends Component
{
    public $suivis;
    public $suivisLists;
    public $personnes;
    public $matriculeProfil;
    public $user;
    public $personne;
    public $title;
    public $matriculeCibleCount;
    public $matriculeAddCount;
    public $chartData = [];

    public function mount() {
        $this->user = Auth::user();

        if ($this->user) {
            $this->personne = Personne::where('Matricule', $this->user->Matricule)->first();
            if ($this->personne) {
                $this->matriculeCibleCount = Suivi::where('MatriculeCible', $this->personne->Matricule)->count();
                $this->matriculeAddCount = Suivi::where('MatriculeAdd', $this->personne->Matricule)->count();
            }
        }

        $this->prepareChartData();
        $this->prepareListData();
    }

    private function prepareChartData() {
        $semestres = EtatSemestre::orderBy('DateDebut')->get();
        $suivis = Suivi::all();

        foreach ($semestres as $index => $semestre) {
            $startDate = $semestre->DateDebut;
            $endDate = $semestre->DateFin;
            $year = date('Y', strtotime($endDate));
            $label = $semestre->NomSemestre . '-' . $year;

            $cibleCount = $suivis->where('DateSuivi', '>=', $startDate)
                                 ->where('DateSuivi', '<=', $endDate)
                                 ->where('MatriculeCible', $this->personne->Matricule ?? '')
                                 ->count();

            $addCount = $suivis->where('DateSuivi', '>=', $startDate)
                               ->where('DateSuivi', '<=', $endDate)
                               ->where('MatriculeAdd', $this->personne->Matricule ?? '')
                               ->count();

            $this->chartData['labels'][] = $label;
            $this->chartData['datasets']['cible'][] = $cibleCount;
            $this->chartData['datasets']['add'][] = $addCount;

            // Handle periods between semesters
            if ($index < count($semestres) - 1) {
                $nextSem = $semestres[$index + 1];
                $periodStartDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
                $periodEndDate = date('Y-m-d', strtotime($nextSem->DateDebut . ' -1 day'));
                $periodLabel = 'Pause semestre-' . $year;

                $periodCibleCount = $suivis->where('DateSuivi', '>=', $periodStartDate)
                                           ->where('DateSuivi', '<=', $periodEndDate)
                                           ->where('MatriculeCible', $this->personne->Matricule ?? '')
                                           ->count();

                $periodAddCount = $suivis->where('DateSuivi', '>=', $periodStartDate)
                                         ->where('DateSuivi', '<=', $periodEndDate)
                                         ->where('MatriculeAdd', $this->personne->Matricule ?? '')
                                         ->count();

                $this->chartData['labels'][] = $periodLabel;
                $this->chartData['datasets']['cible'][] = $periodCibleCount;
                $this->chartData['datasets']['add'][] = $periodAddCount;
            }
        }
    }

    private function prepareListData() {
        if ($this->user) {
            $this->suivisLists = Suivi::where('MatriculeAdd', $this->user->Matricule)
                                 ->orWhere('MatriculeCible', $this->user->Matricule)
                                 ->get();
        } else {
            $this->suivisLists = collect();
        }
    }

    public function render()
    {
        return view('livewire.profil', [
            'matriculeCibleCount' => $this->matriculeCibleCount,
            'matriculeAddCount' => $this->matriculeAddCount,
            'chartData' => $this->chartData,
            'suivisLists' => $this->suivisLists,
        ]);
    }
}
