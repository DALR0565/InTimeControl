<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return Auth::check() ? redirect()->route('trabajadores.index'):redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::middleware(['auth'])->group(function (){
    Route::resource("/trabajadores", TrabajadorController::class)->parameters([
        "trabajadores" => "trabajador",
    ])->except(['show', 'store','destroy', 'update']);

    Route::get('/proyectos',[ProyectoController::class, 'index'])->name('proyectos.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
