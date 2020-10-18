<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\GrafoDirigidoController;
use App\Http\Controllers\GrafoSimpleController;
use App\Http\Controllers\GrafoController;
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

Route::get('/', InicioController::class)->name('home');

Route::get('grafos', [GrafoController::class, 'index'])->name('inicio-grafo');

Route::get('grafos/crear', [GrafoController::class, 'create'])->name('crear-grafo');

Route::get('grafos/crear/grafo-dirigido', GrafoDirigidoController::class)->name('grafo-dirigido');

Route::get('grafos/crear/grafo-simple', GrafoSimpleController::class)->name('grafo-simple');

Route::get('grafos/procesando-grafo', [GrafoController::class, 'proceso'])->name('procesando-grafo');