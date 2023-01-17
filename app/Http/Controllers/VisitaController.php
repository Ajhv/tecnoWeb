<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitaController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('visitas.visitas');
    }

}
