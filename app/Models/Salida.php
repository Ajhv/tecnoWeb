<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    protected $fillable = ['id_activo', 'fecha_ingreso', 'fecha_salida', 'tipo_ingreso', 'valor', 'vida_util', 'ultimo_mantenimiento'];

    public function activo(){
        return $this->belongsTo('App\Models\Activo');
    }
}
