<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mantenimiento;

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
         //Con paginación
         $mantenimientos = Mantenimiento::paginate(5);
         return view('mantenimientos.index',compact('mantenimientos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenimientos.crear');
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
        return view('mantenimientos.editar',compact('mantenimiento'));
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
