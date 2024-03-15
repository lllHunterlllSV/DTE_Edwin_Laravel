<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/token',[App\Http\Controllers\tokenController::class, 'cargarDatos'])->name('token');
Route::post('/generartoken',[App\Http\Controllers\tokenController::class, 'generarToken'])->name('generartoken');


Route::get('/emisor',[App\Http\Controllers\EmisorController::class, 'cargarDatos'])->name('emisor');
Route::post('/agregaremisor',[App\Http\Controllers\EmisorController::class, 'agregarEmisor'])->name('agregaremisor');
Route::post('/modificaremisor',[App\Http\Controllers\EmisorController::class, 'modificar_emisor'])->name('modificaremisor');
Route::post('/eliminaremisor',[App\Http\Controllers\EmisorController::class, 'eliminar_emisor'])->name('eliminaremisor');

Route::get('/receptor',[App\Http\Controllers\ReceptorController::class, 'cargarDatos'])->name('receptor');
Route::post('/agregarreceptor',[App\Http\Controllers\ReceptorController::class, 'agregarReceptor'])->name('agregarreceptor');
Route::post('/modificarreceptor',[App\Http\Controllers\ReceptorController::class, 'modificar_receptor'])->name('modificarreceptor');
Route::post('/eliminarreceptor',[App\Http\Controllers\ReceptorController::class, 'eliminar_receptor'])->name('eliminarreceptor');