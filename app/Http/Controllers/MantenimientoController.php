<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mantenimiento;
use App\Models\Activo;
use App\Models\Persona;

class MantenimientoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-mantenimiento|crear-mantenimiento|editar-mantenimiento|borrar-mantenimiento')->only('index');
         $this->middleware('permission:crear-mantenimiento', ['only' => ['create','store']]);
         $this->middleware('permission:editar-mantenimiento', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-mantenimiento', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $mantenimientos = Mantenimiento::join('activos', 'mantenimientos.id_activo','=', 'activos.id')
        ->join('personas', 'mantenimientos.id_responsable','=', 'personas.id')
        ->select ('mantenimientos.*', 'activos.nombre as activo', 'personas.nombre as responsable')
        ->get(); 
        //Con paginación
         $mantenimientos1 = Mantenimiento::paginate(5);
         return view('mantenimientos.index',compact('mantenimientos', 'mantenimientos1'));
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
            'Correctivo' => 'Correctivo',
            'Preventivo' => 'Preventivo',
        ];

        $activos = Activo::all();

        $personas = Persona::all();

        return view('mantenimientos.crear', compact('tipo', 'activos', 'personas'));
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
            'tipo' => 'required',
            'fecha_solicitud' => 'required',
            'descripcion' => 'required',
            'id_activo' => 'required',
            'id_responsable' => 'required',
        ]);
    
        Mantenimiento::create($request->all());
    
        return redirect()->route('mantenimientos.index');
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
    public function edit(Mantenimiento $mantenimiento)
    {
        $tipo = [
            'Correctivo' => 'Correctivo',
            'Preventivo' => 'Preventivo',
        ];

        $activos = Activo::all();

        $personas = Persona::all();
        
        return view('mantenimientos.editar',compact('mantenimiento', 'tipo', 'activos', 'personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
         request()->validate([
            'tipo' => 'required',
            'fecha_solicitud' => 'required',
            'descripcion' => 'required',
            'id_activo' => 'required',
            'id_responsable' => 'required',

        ]);
    
        $mantenimiento->update($request->all());
    
        return redirect()->route('mantenimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
    
        return redirect()->route('mantenimientos.index');
    }
}
