<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ambiente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'tipo', 'descripcion','dimension', 'ubicacion', 'foto'];


    public function personas(){
        return $this->hasMany('App\Models\Persona');
    }

    public function activos(){
        return $this->hasMany('App\Models\Activo');
    }

    public function traspasos(){
        return $this->hasMany('App\Models\Traspaso');
    }
}
