<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ci'];

    public function ambiente(){
        return $this->belongsTo('App\Models\Ambiente');
    }

    public function traspasos(){
        return $this->hasMany('App\Models\Traspaso');
    }
}
