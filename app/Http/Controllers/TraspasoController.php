<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Traspaso;
use App\Models\Ambiente;
use App\Models\Persona;
use App\Models\Activo;

class TraspasoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-traspaso_activo|crear-traspaso_activo|editar-traspaso_activo|borrar-traspaso_activo')->only('index');
         $this->middleware('permission:crear-traspaso_activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-traspaso_activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-traspaso_activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $traspasos = Traspaso::join('ambientes', 'traspasos.id_ambiente', '=', 'ambientes.id')
        ->join('personas', 'traspasos.id_persona', '=', 'personas.id')
        ->join('activos', 'traspasos.id_activo', '=', 'activos.id')
        ->select ('traspasos.*', 'activos.nombre as activo', 'personas.nombre as encargado', 'ambientes.nombre as ambiente')
        ->get(); 
        //Con paginación
         $traspasos1 = Traspaso::paginate(10);
         return view('traspasos.index',compact('traspasos', 'traspasos1'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activos = Activo::all();
        $personas = Persona::all();
        $ambientes = Ambiente::all();
        return view('traspasos.crear', compact('activos', 'personas', 'ambientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fecha_asignacion' => 'required',
            'id_ambiente' => 'required',
            'id_persona' => 'required',
            'id_activo' => 'required',
        ]);
    
        Traspaso::create($request->all());
    
        return redirect()->route('traspasos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Traspaso $traspaso)
    {
        $activos = Activo::all();
        $personas = Persona::all();
        $ambientes = Ambiente::all();
        return view('traspasos.editar',compact('traspaso', 'activos', 'personas', 'ambientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traspaso $traspaso)
    {
         request()->validate([
            'fecha_asignacion' => 'required',
            'id_ambiente' => 'required',
            'id_persona' => 'required',
            'id_activo' => 'required',
        ]);
    
        $traspaso->update($request->all());
    
        return redirect()->route('traspasos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traspaso $traspaso)
    {
        $traspaso->delete();
    
        return redirect()->route('traspasos.index');
    }
}
