<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activo;

class ActivoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-activo|crear-activo|editar-activo|borrar-activo')->only('index');
         $this->middleware('permission:crear-activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $activos = Activo::paginate(5);
         return view('activos.index',compact('activos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activos.crear');
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
            'codigo' => 'required',
            'nombre' => 'required',
            'fecha_ingreso' => 'required',
            'vida_util' => 'required',
            'valor' => 'required',
            'periodo_mantenimiento' => 'required',
            'ultimo_mantenimiento' => 'required',
            'id_categoria' => 'required',
            'id_ingreso' => 'required',
            'id_estado' => 'required',
        ]);
    
        Activo::create($request->all());
    
        return redirect()->route('activos.index');
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
    public function edit(Activo $activo)
    {
        return view('activos.editar',compact('activo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
         request()->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'fecha_ingreso' => 'required',
            'vida_util' => 'required',
            'valor' => 'required',
            'periodo_mantenimiento' => 'required',
            'ultimo_mantenimiento' => 'required',
            'id_categoria' => 'required',
            'id_ingreso' => 'required',
            'id_estado' => 'required',
        ]);
    
        $activo->update($request->all());
    
        return redirect()->route('activos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        $activo->delete();
    
        return redirect()->route('activos.index');
    }
}