<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'fecha_solicitud', 'descripcion', 'id_activo', 'id_responsable'];

    public function detalles(){
        return $this->hasMany('App\Models\Detalle');
    }

    public function activo(){
        return $this->belongsTo('App\Models\Activo');
    }

    public function persona(){
        return $this->belongsTo('App\Models\Persona');
    }
}
