<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Logout;
use App\Livewire\SuiviDesEtudiants;
use App\Livewire\GestionDesRoles;
use App\Livewire\Membres;
use App\Livewire\WorkEducation;
use App\Livewire\Personnages;
use App\Livewire\ActiviteUniversite;
use App\Livewire\ActiviteSa;
use App\Livewire\ActiviteAutres;
use App\Livewire\GestionDesUtilisateurs;
use App\Livewire\Parametres;
use App\Livewire\Profil;
use App\Livewire\Matricule;
use App\Livewire\NotFound;
use App\Livewire\NotAuthorized;

use App\Http\Controllers\SuiviController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\WorkedController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\OutilsController;


use App\Livewire\CurrentDateSemestre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/gestiondesutilisateurs', GestionDesUtilisateurs::class)->name('gestion-des-utilisateurs');
        Route::post('/gestion-des-utilisateurs', [UserController::class, 'store'])->name('users.store');
        Route::put('/gestion-des-utilisateurs/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/gestion-des-utilisateurs/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/outils', Parametres::class)->name('parametres');

        Route::post('/etatsemetres', [OutilsController::class, 'storeEtatSemestre'])->name('etatsemestre.store');
        Route::put('/etatsemetres/{id}', [OutilsController::class, 'updateEtatSemestre'])->name('etatsemestre.update');


    });

    Route::middleware(['isPersonnel'])->group(function () {

        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/matricule/{matricule}', Matricule::class)->name('matricule.show');

        Route::get('/suividesetudiants', SuiviDesEtudiants::class)->name('suivi-des-etudiants');
        Route::get('/personnages', Personnages::class)->name('personnages');
        Route::get('/workeducation', WorkEducation::class)->name('work-education');
        Route::get('/membres', Membres::class)->name('membres');
        Route::get('/activiteuniversite', ActiviteUniversite::class)->name('activite-universite');
        Route::get('/activitesa', ActiviteSa::class)->name('activite-sa');
        Route::get('/activiteautres', ActiviteAutres::class)->name('activite-autres');

        Route::post('/suividesetudiants', [SuiviController::class, 'store'])->name('suivi.store');
        Route::put('/suividesetudiants/{id}', [SuiviController::class, 'update'])->name('suivi.update');
        Route::delete('/suividesetudiants/{id}', [SuiviController::class, 'destroy'])->name('suivi.destroy');

        Route::post('/membres', [MembreController::class, 'store'])->name('membres.store');
        Route::put('/membres/{id}', [MembreController::class, 'update'])->name('membres.update');
        Route::delete('/membres/{id}', [MembreController::class, 'destroy'])->name('membres.destroy');

        Route::post('/worked', [WorkedController::class, 'store'])->name('worked.store');
        Route::put('/worked/{id}', [WorkedController::class, 'update'])->name('worked.update');

        Route::post('/activite', [ActiviteController::class, 'store'])->name('activite.store');
        Route::put('/activite/{id}', [ActiviteController::class, 'update'])->name('activite.update');

        Route::get('/gestiondesroles', GestionDesRoles::class)->name('gestion-des-roles');
        Route::post('/gestion-des-roles', [RoleController::class, 'store'])->name('roles.store');
        Route::put('/gestion-des-roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/gestion-des-roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    Route::get('/profil', Profil::class)->name('profil');
    Route::get('/not-authorized', NotAuthorized::class)->name('not-authorized');
    Route::get('/not-found', NotFound::class)->name('not-found');
});

Route::fallback(function () {
    return view('404');
});