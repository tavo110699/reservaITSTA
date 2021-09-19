<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encargadoSitio extends Model
{
    use HasFactory;
    protected $table = 'encargado_sitios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idPlace',
        'idUser',
    ];

    public function getPlace() {
        //llama al registro foraneo
        return hasmany('App\Models\Place', 'id');
      //  return $this -> belongsTo('App\Models\Place');
    }
    public function getUser() {
        //llama al registro foraneo
        return hasmany('App\Models\User', 'id');

       // return $this -> belongsTo('App\Models\User');
    }

}
