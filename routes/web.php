<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\DependienteController;
use App\Http\Controllers\MapaController;

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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::resource('proyectos', ProyectoController::class);
    Route::resource('tareas', TareaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('presupuestos', PresupuestoController::class);
    Route::resource('dependientes', DependienteController::class);
    Route::resource('mapas', MapaController::class);
});

Route::get('asignaciones', function () {
    return view('asignaciones.index');
});

Route::get('controles', function () {
    return view('controles.index');
});

Route::get('graficos', function () {
    return view('presupuestos.graficos');
});