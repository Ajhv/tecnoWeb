<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Ambiente;

class PersonaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-persona|crear-persona|editar-persona|borrar-persona')->only('index');
         $this->middleware('permission:crear-persona', ['only' => ['create','store']]);
         $this->middleware('permission:editar-persona', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-persona', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $personas = Persona::join('ambientes', 'personas.id_ambiente','=', 'ambientes.id')
        ->select ('personas.*', 'ambientes.nombre as ambiente')
        ->get();
         $personas1 = Persona::paginate(5);
         return view('personas.index',compact('personas', 'personas1'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambientes = Ambiente::all();
        return view('personas.crear')->with('ambientes', $ambientes);
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
            'ci' => 'required',
            'id_ambiente' => 'required',
        ]);
    
        Persona::create($request->all());
    
        return redirect()->route('personas.index');
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
    public function edit(Persona $persona)
    {
        $ambientes = Ambiente::all();
        return view('personas.editar',compact('persona', 'ambientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
         request()->validate([
            'nombre' => 'required',
            'ci' => 'required',
            'id_ambiente' => 'required',
        ]);
    
        $persona->update($request->all());
    
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
    
        return redirect()->route('personas.index');
    }
}