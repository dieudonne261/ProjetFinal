<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Activite;
use App\Models\EtatSemestre;
use App\Models\Membre;
use App\Models\MembreUser;
use App\Models\Personne;
use App\Models\Role;
use App\Models\Suivi;
use App\Models\User;
use App\Models\Worked;
use App\Models\WorkedUser;




#[Title('UAZ - Dashboard')] 
class Dashboard extends Component
{
    public $activites;
    public $activitesO;
    public $activitesU;
    public $activitesS;
    public $etatSemestres;
    public $membres;
    public $membresusers;
    public $personnes;
    public $roles;
    public $suivis;
    public $users;
    public $workeds;
    public $workedsusers;

    public $suiviStats;
    public $suiviDateLabels;
    public $suiviDateCounts;


    public function mount() {
        $this->activites = Activite::all();
        $this->etatSemestres = EtatSemestre::all();
        $this->membres = Membre::with('MembreUsers')->get();
        $this->membresusers = MembreUser::all();
        $this->personnes = Personne::all();
        $this->suivis = Suivi::all();
        $this->users = User::all();
        $this->roles = Role::inRandomOrder()->get();
        $this->workeds = Worked::with('WorkedUsers')->get();
        $this->workedsusers = WorkedUser::all();

        $this->activitesO = Activite::whereNotIn('Type', ['Université', 'SA'])->get();
        $this->activitesS = Activite::where('Type', 'SA')->get();
        $this->activitesU = Activite::where('Type', 'Université')->get();

        $this->loadSuiviStats();
        $this->loadSuiviDateData();
    }

    public function loadSuiviStats() {

        $suiviCounts = Suivi::selectRaw('Types, COUNT(*) as count')
                            ->groupBy('Types')
                            ->orderByDesc('count')
                            ->get();

        $total = Suivi::count();
        $this->suiviStats = [
            'labels' => [],
            'data' => [],
            'percentages' => []
        ];

        $otherCount = 0;
        $threshold = 3;
        foreach ($suiviCounts as $index => $suivi) {
            if ($index < $threshold) {
                $this->suiviStats['labels'][] = $suivi->Types;
                $this->suiviStats['data'][] = $suivi->count;
                $this->suiviStats['percentages'][] = round(($suivi->count / $total) * 100, 2);
            } else {
                $otherCount += $suivi->count;
            }
        }
        
        if ($otherCount > 0) {
            $this->suiviStats['labels'][] = 'Autre';
            $this->suiviStats['data'][] = $otherCount;
            $this->suiviStats['percentages'][] = round(($otherCount / $total) * 100, 2);
        }
    }

    public function loadSuiviDateData() {
        $suiviDateCounts = Suivi::selectRaw('DateSuivi, COUNT(*) as count')
                                ->groupBy('DateSuivi')
                                ->orderBy('DateSuivi')
                                ->get();

        $this->suiviDateLabels = $suiviDateCounts->pluck('DateSuivi')->toArray();
        $this->suiviDateCounts = $suiviDateCounts->pluck('count')->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}