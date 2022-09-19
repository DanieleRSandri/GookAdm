<?php

use Illuminate\Support\Facades\Route;

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

Route::get('usuarios',[App\Http\Controllers\UsuariosController::class,'index']);
Route::get('locais',[App\Http\Controllers\LocaisController::class,'index']);
Route::get('quadras',[App\Http\Controllers\QuadrasController::class,'index']);
Route::get('clientes',[App\Http\Controllers\ClientesController::class,'index']);
Route::get('agendas',[App\Http\Controllers\AgendasController::class,'index']);
Route::get('consumoClientes',[App\Http\Controllers\ConsumoClienteController::class,'index']);
Route::get('consumoProduto',[App\Http\Controllers\ConsumoProdutosController::class,'index']);
Route::get('produtos',[App\Http\Controllers\ProdutosController::class,'index']);