<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Personne;
use App\Models\Suivi;
use App\Models\EtatSemestre;
use App\Models\Membre;
use App\Models\MembreUser;
use App\Models\Role;
use App\Models\WorkedUser;
use App\Models\Worked;
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
    public $chartData3 = [];
    public $chartDataRole = [];
    public $workedList = [];

    public function mount() {
        $this->user = Auth::user();
    
        if ($this->user) {
            $this->personne = Personne::where('student_id', $this->user->Matricule)->first();
            if ($this->personne) {
                $this->matriculeCibleCount = Suivi::where('MatriculeCible', $this->personne->Matricule)->count();
                $this->matriculeAddCount = Suivi::where('MatriculeAdd', $this->personne->Matricule)->count();
            }
        }
    


        $this->prepareChartData();
        $this->prepareChartData3();
        $this->prepareChartRole();
        $this->prepareListData();
        $this->loadworkedLists();
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

    private function prepareChartData3() {
        $chartData = [];
    
        if ($this->user) {
            $membres = Membre::all();
            
            foreach ($membres as $membre) {
                $membreUsers = MembreUser::where('IdMembres', $membre->id)
                                         ->where('Matricule', $this->user->Matricule)
                                         ->get();
    
                foreach ($membreUsers as $membreUser) {
                    $chartData[] = [
                        'name' => $membreUser->Role,
                        'data' => [
                            [
                                'x' => $membre->Nom,
                                'y' => [
                                    strtotime($membreUser->DateAjout) * 1000,
                                    ($membreUser->DateRetire ? strtotime($membreUser->DateRetire) : strtotime($membre->Fin)) * 1000,
                                ]
                            ]
                        ]
                    ];
                }
            }
        }
    
        $this->chartData3 = $chartData;
    }
    

    private function prepareChartRole() {
        $chartData = [];
        if ($this->user) {
            $roles = Role::where('Matricule', $this->user->Matricule)->get();
    
            foreach ($roles as $role) {
                $chartData[] = [
                    'x' => $role->NomResponsabilite,
                    'y' => [
                        strtotime($role->Debut) * 1000,
                        ($role->Fin ? strtotime($role->Fin) : strtotime(now())) * 1000,
                    ],
                    'fillColor' => '#008FFB' // Ajoutez la couleur que vous souhaitez ici
                ];
            }
        }
    
        $this->chartDataRole = $chartData;
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


    public function loadworkedLists()
    {
        if ($this->user) {
            $workeds = Worked::all();
            $semestres = EtatSemestre::all();
            $nom_sem ;
            foreach ($workeds as $worked) {
                $workedUsers = WorkedUser::where('IdWorked', $worked->id)
                                         ->where('Matricule', $this->user->Matricule)
                                         ->get();

                foreach ($semestres as $semestre) {
                    if($semestre->IdSemestre == $worked->IdSemestre){
                        $nom_sem = $semestre->NomSemestre;
                    }
                }
                foreach ($workedUsers as $workedUser) {
                    $this->workedList[] = [
                        'Nom' => $worked->Nom,
                        'IdSemestre' => $nom_sem,
                        'Note' => $workedUser->Note ?? 0
                    ];
                }
            }
        }
    }

    


    public function render() {
        return view('livewire.profil', [
            'matriculeCibleCount' => $this->matriculeCibleCount,
            'matriculeAddCount' => $this->matriculeAddCount,
            'chartData' => $this->chartData,
            'chartData3' => $this->chartData3,
            'chartDataRole' => $this->chartDataRole,
            'suivisLists' => $this->suivisLists,
        ]);
    }
}
