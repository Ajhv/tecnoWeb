<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proyecto;

class ProyectoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-proy|crear-proy|editar-proy|borrar-proy')->only('index');
         $this->middleware('permission:crear-proy', ['only' => ['create','store']]);
         $this->middleware('permission:editar-proy', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-proy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $proyectos = Proyecto::paginate(5);
         return view('proyectos.index',compact('proyectos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.crear');
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
            'descripcion' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'Presupuesto' => 'required',
        ]);
    
        Proyecto::create($request->all());
    
        return redirect()->route('proyectos.index');
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
    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.editar',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
         request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'Presupuesto' => 'required',
        ]);
    
        $proyecto->update($request->all());
    
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
    
        return redirect()->route('proyectos.index');
    }
}