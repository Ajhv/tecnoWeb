<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activo;
use App\Models\Categoria;
use App\Models\Ambiente;


class ActivoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-activo|crear-activo|editar-activo|borrar-activo')->only('index');
         $this->middleware('permission:crear-activo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-activo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-activo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Activo::join('categorias', 'activos.id_categoria', '=', 'categorias.id')
            ->join('ambientes', 'activos.id_ambiente', '=', 'ambientes.id')
            ->select ('activos.*', 'categorias.nombre as categoria', 'ambientes.nombre as ambiente')
            ->get();   
         //Con paginación
         $activos1 = Activo::paginate(10);
        //return $activos;
        return view('activos.index',compact('activos', 'activos1'));
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
            'Buenas condiciones' => 'Buenas condiciones',
            'Mantenimiento' => 'Mantenimiento',
            'En desuso' => 'En desuso',
        ];

        $categorias = Categoria::all();
        $ambientes = Ambiente::all();
        return view('activos.crear', compact('categorias', 'ambientes', 'estado'));
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
            'codigo' => 'required',
            'nombre' => 'required',
            'id_categoria' => 'required',
            'descripcion' => 'required',
            'id_ambiente' => 'required',
            'estado' => 'required',
            'foto' => 'required',
            
        ]);
    
        Activo::create($request->all());
    
        return redirect()->route('activos.index');
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
    public function edit(Activo $activo)
    {
        $estado = [
            'Buenas condiciones' => 'Buenas condiciones',
            'Mantenimiento' => 'Mantenimiento',
            'En desuso' => 'En desuso',
        ];
        $categorias = Categoria::all();
        $ambientes = Ambiente::all();
        return view('activos.editar',compact('activo', 'categorias', 'ambientes', 'estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
         request()->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'id_categoria' => 'required',
            'descripcion' => 'required',
            'id_ambiente' => 'required',
            'estado' => 'required',
            'foto' => 'required',
        ]);
    
        $activo->update($request->all());
    
        return redirect()->route('activos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        $activo->delete();
    
        return redirect()->route('activos.index');
    }
}