<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependiente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'cargo'];

    public function presupuestos(){

        return $this->hasMany('App\Models\Presupuesto');
    }

}

