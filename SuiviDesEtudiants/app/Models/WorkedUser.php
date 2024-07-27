<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'IdWorked', 
        'Matricule', 
        'Note'
    ];

    public function worked()
    {
        return $this->belongsTo(Worked::class, 'IdWorked', 'IdWorked');
    }
    
}