<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(Request $request){
        if (empty($request->input('texto'))) {
            return back()->with('error', 'Campo buscar vacio');
        } else {
            $activos = DB::table('activos')
                        ->where('codigo', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('nombre', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'codigo', 'nombre')
                        ->get();

            $ambientes =  DB::table('ambientes')
                        ->where('nombre', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('tipo', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('descripcion', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'nombre', 'tipo', 'descripcion')
                        ->get();

            $users = DB::table('users')
                        ->where('name', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('email', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'name', 'email')
                        ->get();

            $movimientos = DB::table('movimientos')
                        ->where('tipo', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('descripcion', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'tipo', 'descripcion')
                        ->get();

            $mantenimientos = DB::table('mantenimientos')
                        ->where('tipo', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('descripcion', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'tipo', 'descripcion')
                        ->get();

            $detalles = DB::table('detalles')
                        ->where('estado', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('descripcion', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'estado', 'descripcion')
                        ->get();

            $personas = DB::table('personas')
                        ->where('nombre', 'LIKE', '%'.$request->input('texto').'%')
                        ->orWhere('ci', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'nombre', 'ci')
                        ->get();

            $traspasos = DB::table('traspasos')
                        ->where('fecha_asignacion', 'LIKE', '%'.$request->input('texto').'%')
                        ->select('id', 'fecha_asignacion')
                        ->get();

            // $denuncias = DB::table('denuncias')
            //             ->where('descripcion', 'LIKE', '%'.$request->input('texto').'%')
            //             ->orWhere('zona', 'LIKE', '%'.$request->input('texto').'%')
            //             ->select('id', 'descripcion', 'zona')
            //             ->get();

            // $correos = DB::table('correos')
            //             ->where('nombre', 'LIKE', '%'.$request->input('texto').'%')
            //             ->orWhere('descripcion', 'LIKE', '%'.$request->input('texto').'%')
            //             ->select('codcorreo', 'nombre', 'descripcion')
            //             ->get();*/

        return view('search.index', compact('activos','ambientes','users','movimientos','mantenimientos','detalles','personas','traspasos'));
        }
    }
}
