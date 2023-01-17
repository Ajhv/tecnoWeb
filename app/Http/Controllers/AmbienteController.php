<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ambiente;
use App\Models\Mapa;

class AmbienteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-ambiente|crear-ambiente|editar-ambiente|borrar-ambiente')->only('index');
         $this->middleware('permission:crear-ambiente', ['only' => ['create','store']]);
         $this->middleware('permission:editar-ambiente', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-ambiente', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         /*$ambientes = Ambiente::join('mapas', 'ambientes.id_mapa','=', 'mapas.id')
        ->select ('ambientes.*', 'mapas.descripcion', 'mapas.latidud', 'mapas.longitud')
        ->get();*/
         $ambientes = Ambiente::paginate(10);
         return view('ambientes.index',compact('ambientes'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = [
            'Oficina' => 'Oficina',
            'Sala' => 'Sala',
            'Ambiente' => 'Ambiente',
            'Externo' => 'Externo'
        ];
        return view('ambientes.crear', compact('tipo'));
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
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'dimension' => 'required',
            'ubicacion' => 'required',
            'foto' => 'required',

        ]);
    
        Ambiente::create($request->all());
    
        return redirect()->route('ambientes.index');
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
    public function edit(Ambiente $ambiente)
    {
        $tipo = [
            'Oficina' => 'Oficina',
            'Sala' => 'Sala',
            'Ambiente' => 'Ambiente',
            'Externo' => 'Externo'
        ];
        return view('ambientes.editar',compact('ambiente', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambiente $ambiente)
    {
         request()->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'dimension' => 'required',
            'ubicacion' => 'required',
            'foto' => 'required',
        ]);
    
        $ambiente->update($request->all());
    
        return redirect()->route('ambientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
    
        return redirect()->route('ambientes.index');
    }
}
