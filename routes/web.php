<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\TraspasoController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\GraficoPersonaController;
use App\Http\Controllers\GraficoAmbienteController;
use App\Http\Controllers\GraficoActivoController;
use App\Http\Controllers\GraficoAsignacionController;
use App\Http\Controllers\GraficoMantenimientoController;

use App\Http\Controllers\SearchController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function() {
    if (Auth::check()){
        return redirect('home');
    }else{
        return view('index');
    }
})->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('activos', ActivoController::class);
    Route::resource('ambientes', AmbienteController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('detalles', DetalleController::class);
    Route::resource('mantenimientos', MantenimientoController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('reportes', ReporteController::class);
    Route::resource('salidas', SalidaController::class);
    Route::resource('traspasos', TraspasoController::class);
    Route::resource('movimientos', MovimientoController::class);
    Route::resource('visitas', VisitaController::class)->names('visitas');
    Route::resource('search', SearchController::class)->names('search');
    Route::resource('graficos_persona', GraficoPersonaController::class);
    Route::resource('graficos_ambiente', GraficoAmbienteController::class);
    Route::resource('graficos_activo', GraficoActivoController::class);
    Route::resource('graficos_asignacion', GraficoAsignacionController::class);
    Route::resource('reportes', GraficoMantenimientoController::class);

});

