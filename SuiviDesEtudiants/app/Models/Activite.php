<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $table = 'activite';

    protected $fillable = [
        'idActivite',
        'Type',
        'Responsable',
        'Cible',
        'Description',
        'Rapportfilepath',
        'DateDebut',
        'DateFin',
    ];

}
