<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingreso;

class IngresoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-tipo_ingreso|crear-tipo_ingreso|editar-tipo_ingreso|borrar-tipo_ingreso')->only('index');
         $this->middleware('permission:crear-tipo_ingreso', ['only' => ['create','store']]);
         $this->middleware('permission:editar-tipo_ingreso', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-tipo_ingreso', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $ingresos = Ingreso::paginate(5);
         return view('ingresos.index',compact('ingresos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingresos.crear');
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
    
            Ingreso::create($request->all());
    
        return redirect()->route('ingresos.index');
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
    public function edit(Ingreso $ingreso)
    {
        return view('ingresos.editar',compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
         request()->validate([
            'nombre' => 'required',
        ]);
    
        $ingreso->update($request->all());
    
        return redirect()->route('ingresos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
    
        return redirect()->route('ingresos.index');
    }
}
