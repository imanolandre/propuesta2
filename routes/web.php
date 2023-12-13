<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\CotizacioneController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pagos/filtrar-fechas', [PagoController::class, 'mostrarFormularioFechas'])->name('pago.filtrar-fechas');
Route::resource('/clientes', ClienteController::class)->middleware('auth');;
Route::resource('/proyectos', ProyectoController::class)->middleware('auth');;
Route::resource('/pagos', PagoController::class)->middleware('auth');;
Route::resource('/cotizaciones', CotizacioneController::class)->middleware('auth');;
Route::get('obtener-nombre-cliente/{proyectoId}', [PagoController::class, 'obtenerNombreCliente']);
Route::post('pagos/generar-reporte', [PagoController::class, 'generarReporte'])->name('pago.generar-reporte');
Route::get('export/clientes', [ClienteController::class, 'export'])->name('export.clientes');
Route::get('export/proyectos', [ProyectoController::class, 'export'])->name('export.proyectos');
