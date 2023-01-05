<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ambiente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'dimension'];


    public function ubicacion(){
        return $this->belongsTo('App\Models\Mapa');
    }

    public function personas(){
        return $this->hasMany('App\Models\Persona');
    }

    public function fotografias(){
        return $this->hasMany('App\Models\Fotografia');
    }

    public function traspasos(){
        return $this->hasMany('App\Models\Traspaso');
    }
}
