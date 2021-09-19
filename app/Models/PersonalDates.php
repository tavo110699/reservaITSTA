<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDates extends Model
{
    use HasFactory;
    protected $table = 'personal_dates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idUser',
        'name',
        'apPaterno',
        'apMaterno',
        'Telefono',
        'RFC',
        'CURP',
        'fechaNacimiento',
    ];
}
