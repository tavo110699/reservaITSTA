<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $table = 'places';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'capacidadMax',
        'localizacion',
    ];
    public function getUser() {
        //llama al registro foraneo
        return $this->belongsTo('App\Models\User','id' );
    }

    public function getEncargado() {
        //llama al registro foraneo
        return $this->belongsTo('App\Models\encargadoSitio','id' );
    }
    public static $rules = [
        'name' =>'required |unique',
        'capacidadMax' =>'required',
        'localizacion'=>'required',
    ];
}
