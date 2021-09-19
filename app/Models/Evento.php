<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';

    protected $primaryKey = 'id';

    public static $rules = [
        'title' =>'required',
        'description' =>'required',
        'start' =>'required',
        'end' =>'required'
    ];

    protected $fillable = [
        'title',
        'description',
        'idUser',
        'start',
        'end',
    ];

    public function getUser() {
        //llama al registro foraneo
        return $this->belongsTo('App\Models\User','id' );
    }
}
