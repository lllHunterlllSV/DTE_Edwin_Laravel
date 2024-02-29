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