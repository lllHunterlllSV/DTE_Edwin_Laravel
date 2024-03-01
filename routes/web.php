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



Route::get('/emisor',[App\Http\Controllers\EmisorController::class, 'cargarDatos'])->name('emisor');
Route::post('/agregaremisor',[App\Http\Controllers\EmisorController::class, 'agregarEmisor'])->name('agregaremisor');
Route::post('/modificaremisor',[App\Http\Controllers\EmisorController::class, 'modificar_emisor'])->name('modificaremisor');
Route::post('/eliminaremisor',[App\Http\Controllers\EmisorController::class, 'eliminar_emisor'])->name('eliminaremisor');