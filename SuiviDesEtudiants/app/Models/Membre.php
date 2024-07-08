<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = [
        'IdMembres',
        'Nom', 
        'Description', 
        'Debut', 
        'Fin'
    ];

    public function membreUsers()
    {
        return $this->hasMany(MembreUser::class, 'IdMembres', 'IdMembres');
    }
}
