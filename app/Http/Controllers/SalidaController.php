<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Salida;

class SalidaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-salida_activo|crear-salida_activo|editar-salida_activo|borrar-asalida_activo')->only('index');
         $this->middleware('permission:crear-salida_activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-salida_activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-salida_activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $salidas = Salida::paginate(5);
         return view('salidas.index',compact('salidas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salidas.crear');
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
            'fecha_salida' => 'required',
            'descripcion' => 'required',
            'id_activo' => 'required',
        ]);
    
        Salida::create($request->all());
    
        return redirect()->route('salidas.index');
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
    public function edit(Salida $salida)
    {
        return view('salidas.editar',compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
         request()->validate([
            'fecha_salida' => 'required',
            'descripcion' => 'required',
            'id_activo' => 'required',
        ]);
    
        $salida->update($request->all());
    
        return redirect()->route('salidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        $salida->delete();
    
        return redirect()->route('salidas.index');
    }
}