<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ambiente;
use App\Models\Persona;
use App\Models\Activo;
use App\Models\Movimiento;

class MovimientoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-movimiento|crear-movimiento|editar-movimiento|borrar-movimiento')->only('index');
         $this->middleware('permission:crear-movimiento', ['only' => ['create','store']]);
         $this->middleware('permission:editar-movimiento', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-movimiento', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $movimientos = Movimiento::join('ambientes as ambientes_origen', 'movimientos.id_ambienteo', '=', 'ambientes_origen.id')
        ->join('ambientes as ambientes_destino', 'movimientos.id_ambiented', '=', 'ambientes_destino.id')
        ->join('personas', 'movimientos.id_persona', '=', 'personas.id')
        ->join('activos', 'movimientos.id_activo', '=', 'activos.id')
        ->select ('movimientos.*', 'activos.nombre as activo', 'personas.nombre as responsable', 'ambientes_origen.nombre as ambiente_origen', 'ambientes_destino.nombre as ambiente_destino')
        ->get(); 
        
        //Con paginación
         $movimientos1 = Movimiento::paginate(10);
         return view('movimientos.index',compact('movimientos', 'movimientos1'));
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
            'Ingreso' => 'Ingreso',
            'Salida' => 'Salida',
        ];
        $activos = Activo::all();
        $personas = Persona::all();
        $ambientes = Ambiente::all();
        return view('movimientos.crear', compact('tipo', 'activos', 'personas', 'ambientes'));
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
            'id_activo' => 'required',
            'fecha_movimiento' => 'required',
            'id_ambienteo' => 'required',
            'id_ambiented' => 'required',
            'id_persona' => 'required',
            'descripcion' => 'required',
        ]);
    
        Movimiento::create($request->all());
    
        return redirect()->route('movimientos.index');
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
    public function edit(Movimiento $movimiento)
    {
        $tipo = [
            'Ingreso' => 'Ingreso',
            'Salida' => 'Salida',
        ];
        
        $activos = Activo::all();
        $personas = Persona::all();
        $ambientes = Ambiente::all();
        return view('movimientos.editar',compact('tipo', 'movimiento', 'activos', 'personas', 'ambientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
         request()->validate([
            'tipo' => 'required',
            'id_activo' => 'required',
            'fecha_movimiento' => 'required',
            'id_ambienteo' => 'required',
            'id_ambiented' => 'required',
            'id_persona' => 'required',
            'descripcion' => 'required',
        ]);
    
        $movimiento->update($request->all());
    
        return redirect()->route('movimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
    
        return redirect()->route('movimientos.index');
    }
}