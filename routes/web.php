<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ConviteController;

Auth::routes();
Route::get('/', [EventosController::class, 'index'])->name('home')->middleware('auth');

Route::post('/eventos/convite', [EventosController::class, 'convite'])->name('convite')->middleware('auth');
Route::get('/eventos/convidado', [EventosController::class, 'convidado'])->name('eventos.convidado')->middleware('auth');

Route::get('/eventos/lixeira', [EventosController::class, 'lixeira'])->name('eventos.lixeira')->middleware('auth');
Route::get('/eventos/{evento}/restaurar', [EventosController::class, 'restaurar'])->name('eventos.restaurar')->middleware('auth');

Route::resource('/eventos', EventosController::class)->middleware('auth');

Route::post('/convites/aceitar', [ConviteController::class, 'aceitar'])->name('convites.aceitar')->middleware('auth');
Route::post('/convites/recusar', [ConviteController::class, 'recusar'])->name('convites.recusar')->middleware('auth');
Route::get('/convites', [ConviteController::class, 'index'])->name('convites.index')->middleware('auth');



