<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Local
Route::get('locais',[App\Http\Controllers\LocaisController::class,'index']);
Route::get('locais/create',[App\Http\Controllers\LocaisController::class,'create']);
Route::post('locais/store',[App\Http\Controllers\LocaisController::class,'store']);

//Produto
Route::get('produtos',[App\Http\Controllers\ProdutosController::class,'index']);
Route::get('produtos/create',[App\Http\Controllers\ProdutosController::class,'create']);
Route::post('produtos/store',[App\Http\Controllers\ProdutosController::class,'store']);

//Quadra
Route::get('quadras',[App\Http\Controllers\QuadrasController::class,'index']);
Route::get('quadras/create',[App\Http\Controllers\QuadrasController::class,'create']);
Route::post('quadras/store',[App\Http\Controllers\QuadrasController::class,'store']);

//Cliente
Route::get('clientes',[App\Http\Controllers\ClientesController::class,'index']);
Route::get('clientes/create',[App\Http\Controllers\ClientesController::class,'create']);
Route::post('clientes/store',[App\Http\Controllers\ClientesController::class,'store']);

//Agenda
Route::get('agendas',[App\Http\Controllers\AgendasController::class,'index']);
Route::get('agendas/create',[App\Http\Controllers\AgendasController::class,'create']);
Route::post('agendas/store',[App\Http\Controllers\AgendasController::class,'store']);

//ConsumoClientes
Route::get('consumoClientes',[App\Http\Controllers\ConsumoClienteController::class,'index']);
Route::get('consumoClientes/create',[App\Http\Controllers\ConsumoClienteController::class,'create']);
Route::post('consumoClientes/store',[App\Http\Controllers\ConsumoClienteController::class,'store']);

//ConsumoProduto
Route::get('consumoProduto',[App\Http\Controllers\ConsumoProdutosController::class,'index']);
Route::get('consumoProduto/create',[App\Http\Controllers\ConsumoProdutosController::class,'create']);
Route::post('consumoProduto/store',[App\Http\Controllers\ConsumoProdutosController::class,'store']);

Route::get('usuarios',[App\Http\Controllers\UsuariosController::class,'index']);
Auth::routes();
