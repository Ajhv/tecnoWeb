<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mantenimiento;
use App\Models\Persona;


class GraficoMantenimientoController extends Controller
{
    public function index(){
       /* $sql = 'SELECT COUNT(*) as conteo FROM mantenimientos GROUP BY tipo;';
        $products = DB::select($sql);*/

        $products = Mantenimiento::select(\DB::raw("COUNT(*) as count"))
                    ->groupBy(\DB::raw("tipo"))
                    ->pluck('count');
        
        /*$products1 = Mantenimiento::select(\DB::raw("COUNT(*) as count"))
                    ->where('tipo', 'preventivo')
                    ->groupBy(\DB::raw("tipo"))
                    ->pluck('count');*/

        //return $products;
        return view('reportes.graficos_mantenimiento.index', compact('products'));
    }

}
