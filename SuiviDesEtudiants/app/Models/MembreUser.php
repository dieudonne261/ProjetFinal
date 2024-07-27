<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'IdMembres',
        'Matricule',
        'Role',
        'DateAjout',
        'DateRetire'
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'IdMembres', 'IdMembres');
    }
}
