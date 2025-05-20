<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TrabajadorController;
use \App\Http\Controllers\ProyectoController;
use \App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function (){
    Route::resource("/trabajadores", TrabajadorController::class)->parameters([
        "trabajadores" => "trabajador",
    ])->except(['show', 'store','destroy', 'update']);

    Route::get('/proyectos',[ProyectoController::class, 'index'])->name('proyectos.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
