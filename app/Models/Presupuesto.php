<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;
    protected $fillable = ['elaboracion', 'id_dependiente', 'monto'];

    public function dependientes(){

        return $this->belongsTo('App\Models\Dependiente');
    }
}
