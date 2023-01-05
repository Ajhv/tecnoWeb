<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'fecha'];

    public function ambiente(){
        return $this->belongsTo('App\Models\Ambiente');
    }

    public function activo(){
        return $this->belongsTo('App\Models\Activo');
    }
}
