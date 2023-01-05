<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'latidud', 'longitud'];

    public function mapa(){

        return $this->hasOne('App\Models\Ambiente');
    }
}
