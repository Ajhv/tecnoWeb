<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'id_activo', 'fecha_movimiento', 'id_ambienteo', 'id_ambiented','id_persona', 'descripcion'];

    public function ambiente(){
        return $this->belongsTo('App\Models\Ambiente');
    }

    public function persona(){
        return $this->belongsTo('App\Models\Persona');
    }

    public function activo(){
        return $this->belongsTo('App\Models\Activo');
    }
}
