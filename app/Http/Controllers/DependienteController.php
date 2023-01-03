<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dependiente;

class DependienteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-pers|crear-pers|editar-pers|borrar-pers')->only('index');
         $this->middleware('permission:crear-pers', ['only' => ['create','store']]);
         $this->middleware('permission:editar-pers', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-pers', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $dependientes = Dependiente::paginate(5);
         return view('dependientes.index',compact('dependientes'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependientes.crear');
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
            'cargo' => 'required',
        ]);
    
        Dependiente::create($request->all());
    
        return redirect()->route('dependientes.index');
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
    public function edit(Dependiente $dependiente)
    {
        return view('dependientes.editar',compact('dependiente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependiente $dependiente)
    {
         request()->validate([
            'nombre' => 'required',
            'cargo' => 'required',
        ]);
    
        $dependiente->update($request->all());
    
        return redirect()->route('dependientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependiente $dependiente)
    {
        $dependiente->delete();
    
        return redirect()->route('dependientes.index');
    }
}