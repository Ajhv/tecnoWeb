<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Traspaso extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_asignacion', 'id_ambiente', 'id_persona', 'id_activo'];

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
