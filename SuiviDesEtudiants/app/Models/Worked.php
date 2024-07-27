<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worked extends Model
{
    use HasFactory;
    protected $fillable = [
        'IdWorked',
        'Nom',
        'Responsable',
        'Description', 
        'IdSemestre',
    ];

    public function workedUsers()
    {
        return $this->hasMany(WorkedUser::class, 'IdWorked', 'IdWorked');
    }
}
