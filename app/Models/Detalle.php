<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable = ['estado', 'descripcion', 'responsable', 'fecha'];

    public function mantenimiento(){
        return $this->belongsTo('App\Models\Mantenimiento');
    }
}
