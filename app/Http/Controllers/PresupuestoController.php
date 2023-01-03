<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Presupuesto;

class PresupuestoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-presu|crear-presu|editar-presu|borrar-presu')->only('index');
         $this->middleware('permission:crear-presu', ['only' => ['create','store']]);
         $this->middleware('permission:editar-presu', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-presu', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $presupuestos = Presupuesto::paginate(5);
         return view('presupuestos.index',compact('presupuestos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presupuestos.crear');
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
            'elaboracion' => 'required',
            'id_dependiente' => 'required',
            'monto' => 'required',

        ]);
    
        Presupuesto::create($request->all());
    
        return redirect()->route('presupuestos.index');
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
    public function edit(Presupuesto $presupuesto)
    {
        return view('presupuestos.editar',compact('presupuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
         request()->validate([
            'elaboracion' => 'required',
            'id_dependiente' => 'required',
            'monto' => 'required',
        ]);
    
        $presupuesto->update($request->all());
    
        return redirect()->route('presupuestos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        $presupuesto->delete();
    
        return redirect()->route('presupuestos.index');
    }

}

