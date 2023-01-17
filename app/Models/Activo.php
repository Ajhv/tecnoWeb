<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'id_categoria', 'descripcion', 'id_ambiente','estado', 'foto'];

    public function traspasos(){
        return $this->hasMany('App\Models\Traspaso');
    }

    public function mantenimientos(){
        return $this->hasMany('App\Models\Mantenimiento');
    }

    public function salida(){
        return $this->hasOne('App\Models\Salida');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function ambiente(){
        return $this->belongsTo('App\Models\Ambiente');
    }

}
