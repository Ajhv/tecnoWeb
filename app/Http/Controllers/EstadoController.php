<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estado;

class EstadoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-estado_activo|crear-estado_activo|editar-estado_activo|borrar-estado_activo')->only('index');
         $this->middleware('permission:crear-estado_activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-estado_activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-estado_activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $estados = Estado::paginate(5);
         return view('estados.index',compact('estados'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.crear');
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
        ]);
    
        Estado::create($request->all());
    
        return redirect()->route('estados.index');
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
    public function edit(Estado $estado)
    {
        return view('estados.editar',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
         request()->validate([
            'nombre' => 'required',
        ]);
    
        $estado->update($request->all());
    
        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
    
        return redirect()->route('estados.index');
    }
}