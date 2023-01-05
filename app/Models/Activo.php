<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'fecha_ingreso', 'vida_util', 'valor', 'periodo_mantenimiento', 'ultimo_mantenimiento', 'id_categoria', 'id_ingreso', 'id_estado'];

    public function traspasos(){
        return $this->hasMany('App\Models\Traspaso');
    }

    public function fotografias(){
        return $this->hasMany('App\Models\Fotografia');
    }

    public function mantenimientos(){
        return $this->hasMany('App\Models\Mantenimiento');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function ingreso(){
        return $this->belongsTo('App\Models\Ingreso');
    }
}
