<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ambiente;

class AmbienteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-ambiente|crear-ambiente|editar-ambiente|borrar-ambiente')->only('index');
         $this->middleware('permission:crear-ambiente', ['only' => ['create','store']]);
         $this->middleware('permission:editar-ambiente', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-ambiente', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $ambientes = Ambiente::paginate(5);
         return view('ambientes.index',compact('ambientes'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ambientes.crear');
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
            'dimension' => 'required',

        ]);
    
        Ambiente::create($request->all());
    
        return redirect()->route('ambientes.index');
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
    public function edit(Ambiente $ambiente)
    {
        return view('ambientes.editar',compact('ambiente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambiente $ambiente)
    {
         request()->validate([
            'nombre' => 'required',
            'dimension' => 'required',
        ]);
    
        $ambiente->update($request->all());
    
        return redirect()->route('ambientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
    
        return redirect()->route('ambientes.index');
    }
}
