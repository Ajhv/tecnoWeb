<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Traspaso;

class TraspasoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-traspaso_activo|crear-traspaso_activo|editar-traspaso_activo|borrar-traspaso_activo')->only('index');
         $this->middleware('permission:crear-traspaso_activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-traspaso_activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-traspaso_activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $traspasos = Traspaso::paginate(5);
         return view('traspasos.index',compact('traspasos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('traspasos.crear');
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
            'descripcion' => 'required',
            'fecha_traslado' => 'required',
        ]);
    
        Traspaso::create($request->all());
    
        return redirect()->route('traspasos.index');
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
    public function edit(Traspaso $traspaso)
    {
        return view('traspasos.editar',compact('traspaso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traspaso $traspaso)
    {
         request()->validate([
            'descripcion' => 'required',
            'fecha_traslado' => 'required',
        ]);
    
        $traspaso->update($request->all());
    
        return redirect()->route('traspasos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traspaso $traspaso)
    {
        $traspaso->delete();
    
        return redirect()->route('traspasos.index');
    }
}
