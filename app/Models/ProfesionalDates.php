<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalDates extends Model
{
    use HasFactory;
    protected $table = 'profesional_dates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idUser',
        'gradoAcademico',
        'carreraProfesional',
        'puesto',
    ];
}
