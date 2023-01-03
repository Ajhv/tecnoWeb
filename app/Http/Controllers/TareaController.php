<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarea;

class TareaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-act|crear-act|editar-act|borrar-act')->only('index');
         $this->middleware('permission:crear-act', ['only' => ['create','store']]);
         $this->middleware('permission:editar-act', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-act', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $tareas = Tarea::paginate(5);
         return view('tareas.index',compact('tareas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.crear');
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
            'inicio' => 'required',
            'fin' => 'required',
            'responsable' => 'required',
            'descripcion' => 'required',
        ]);
    
        Tarea::create($request->all());
    
        return redirect()->route('tareas.index');
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
    public function edit(Tarea $tarea)
    {
        return view('tareas.editar',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
         request()->validate([
            'nombre' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
            'responsable' => 'required',
            'descripcion' => 'required',
        ]);
    
        $tarea->update($request->all());
    
        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
    
        return redirect()->route('tareas.index');
    }
}