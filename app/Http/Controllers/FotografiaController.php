<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fotografia;

class FotografiaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-fotografia|crear-fotografia|editar-fotografia|borrar-fotografia')->only('index');
         $this->middleware('permission:crear-fotografia', ['only' => ['create','store']]);
         $this->middleware('permission:editar-fotografia', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-fotografia', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $fotografias = Fotografia::paginate(5);
         return view('fotografias.index',compact('fotografias'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotografias.crear');
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
            'url' => 'required',
            'fecha' => 'required',

        ]);
    
        Fotografia::create($request->all());
    
        return redirect()->route('fotografias.index');
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
    public function edit(Fotografia $fotografia)
    {
        return view('fotografias.editar',compact('fotografia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotografia $fotografia)
    {
         request()->validate([
            'url' => 'required',
            'fecha' => 'required',
        ]);
    
        $fotografia->update($request->all());
    
        return redirect()->route('fotografias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografia $fotografia)
    {
        $fotografia->delete();
    
        return redirect()->route('fotografias.index');
    }
}