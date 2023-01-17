<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'periodo_mantenimiento'];

    public function activos(){
        return $this->hasMany('App\Models\Activo');
    }
}
