<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Detalle;
use App\Models\Mantenimiento;

class DetalleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-estado_mantenimiento|crear-estado_mantenimiento|editar-estado_mantenimiento|borrar-estado_mantenimiento')->only('index');
         $this->middleware('permission:crear-estado_mantenimiento', ['only' => ['create','store']]);
         $this->middleware('permission:editar-estado_mantenimiento', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-estado_mantenimiento', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $detalles = Detalle::join('mantenimientos', 'detalles.id_mantenimiento', '=', 'mantenimientos.id')
        ->select ('detalles.*', 'mantenimientos.descripcion as mantenimiento')
        ->get();
        //Con paginación
         $detalles1 = Detalle::paginate(10);
         return view('detalles.index',compact('detalles1', 'detalles'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = [
            'Pendiente' => 'Pendiente',
            'En progreso' => 'En progreso',
            'Finalizado' => 'Finalizado',
        ];

        $mantenimientos = Mantenimiento::all();
        return view('detalles.crear', compact('estado', 'mantenimientos'));
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
            'estado' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'id_mantenimiento' => 'required',
        ]);
    
        Detalle::create($request->all());
    
        return redirect()->route('detalles.index');
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
    public function edit(Detalle $detalle)
    {
        $estado = [
            'Pendiente' => 'Pendiente',
            'En progreso' => 'En progreso',
            'Finalizado' => 'Finalizado',
        ];
        $mantenimientos = Mantenimiento::all();
        return view('detalles.editar',compact('detalle', 'estado', 'mantenimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle $detalle)
    {
         request()->validate([
            'estado' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'id_mantenimiento' => 'required',
        ]);
    
        $detalle->update($request->all());
    
        return redirect()->route('detalles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle $detalle)
    {
        $detalle->delete();
    
        return redirect()->route('detalles.index');
    }
}