<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mapa;

class MapaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-ubi|crear-ubi|editar-ubi|borrar-ubi')->only('index');
         $this->middleware('permission:crear-ubi', ['only' => ['create','store']]);
         $this->middleware('permission:editar-ubi', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-ubi', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $mapas = Mapa::paginate(5);
         return view('mapas.index',compact('mapas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapas.crear');
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
            'ciudad' => 'required',
            'departamento' => 'required',
            'coordenadas' => 'required',
            'descripcion' => 'required',
        ]);
    
        Mapa::create($request->all());
    
        return redirect()->route('mapas.index');
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
    public function edit(Mapa $mapa)
    {
        return view('mapas.editar',compact('mapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapa $mapa)
    {
         request()->validate([
            'ciudad' => 'required',
            'departamento' => 'required',
            'coordenadas' => 'required',
            'descripcion' => 'required',
        ]);
    
        $mapa->update($request->all());
    
        return redirect()->route('mapas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapa $mapa)
    {
        $mapa->delete();
    
        return redirect()->route('mapas.index');
    }
}