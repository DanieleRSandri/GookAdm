<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Local
Route::group(['prefix'=>'locais', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',            ['as'=>'locais',          'uses'=>'App\Http\Controllers\LocaisController@index']);
    Route::get('create',      ['as'=>'locais.create',    'uses'=>'App\Http\Controllers\LocaisController@create']);
    Route::get('{id}/destroy',['as'=>'locais.destroy',  'uses'=>'App\Http\Controllers\LocaisController@destroy']);
    Route::get('{id}/edit',   ['as'=>'locais.edit',     'uses'=>'App\Http\Controllers\LocaisController@edit']);
    Route::put('{id}/update', ['as'=>'locais.update',   'uses'=>'App\Http\Controllers\LocaisController@update']);
    Route::post('store',      ['as'=>'locais.store',    'uses'=>'App\Http\Controllers\LocaisController@store']);
});

//Produto
Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',            ['as'=>'produtos',          'uses'=>'App\Http\Controllers\ProdutosController@index']);
    Route::get('create',      ['as'=>'produtos.create',    'uses'=>'App\Http\Controllers\ProdutosController@create']);
    Route::get('{id}/destroy',['as'=>'produtos.destroy',  'uses'=>'App\Http\Controllers\ProdutosController@destroy']);
    Route::get('{id}/edit',   ['as'=>'produtos.edit',     'uses'=>'App\Http\Controllers\ProdutosController@edit']);
    Route::put('{id}/update', ['as'=>'produtos.update',   'uses'=>'App\Http\Controllers\ProdutosController@update']);
    Route::post('store',      ['as'=>'produtos.store',    'uses'=>'App\Http\Controllers\ProdutosController@store']);
});

//Quadra
Route::group(['prefix'=>'quadras', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',            ['as'=>'quadras',          'uses'=>'App\Http\Controllers\QuadrasController@index']);
    Route::get('create',      ['as'=>'quadras.create',    'uses'=>'App\Http\Controllers\QuadrasController@create']);
    Route::get('{id}/destroy',['as'=>'quadras.destroy',  'uses'=>'App\Http\Controllers\QuadrasController@destroy']);
    Route::get('{id}/edit',   ['as'=>'quadras.edit',     'uses'=>'App\Http\Controllers\QuadrasController@edit']);
    Route::put('{id}/update', ['as'=>'quadras.update',   'uses'=>'App\Http\Controllers\QuadrasController@update']);
    Route::post('store',      ['as'=>'quadras.store',    'uses'=>'App\Http\Controllers\QuadrasController@store']);
});

//Cliente
Route::group(['prefix'=>'clientes', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',            ['as'=>'clientes',          'uses'=>'App\Http\Controllers\ClientesController@index']);
    Route::get('create',      ['as'=>'clientes.create',    'uses'=>'App\Http\Controllers\ClientesController@create']);
    Route::get('{id}/destroy',['as'=>'clientes.destroy',  'uses'=>'App\Http\Controllers\ClientesController@destroy']);
    Route::get('{id}/edit',   ['as'=>'clientes.edit',     'uses'=>'App\Http\Controllers\ClientesController@edit']);
    Route::put('{id}/update', ['as'=>'clientes.update',   'uses'=>'App\Http\Controllers\ClientesController@update']);
    Route::post('store',      ['as'=>'clientes.store',    'uses'=>'App\Http\Controllers\ClientesController@store']);
});

//Agenda
Route::get('agendas',[App\Http\Controllers\AgendasController::class,'index'])->name('agendas.listar');
Route::get('agendas/create',[App\Http\Controllers\AgendasController::class,'create'])->name('agendas.criar');
Route::post('agendas/store',[App\Http\Controllers\AgendasController::class,'store']);
Route::get('agendas/{id}/destroy',[App\Http\Controllers\LocaisController::class,'destroy']);
Route::get('agendas/{id}/edit',[App\Http\Controllers\LocaisController::class,'edit']);
Route::put('agendas/{id}/update',[App\Http\Controllers\LocaisController::class,'update']);

//ConsumoClientes
Route::get('consumoClientes',[App\Http\Controllers\ConsumoClienteController::class,'index'])->name('consumoClientes.listar');
Route::get('consumoClientes/create',[App\Http\Controllers\ConsumoClienteController::class,'create'])->name('consumoClientes.criar');
Route::post('consumoClientes/store',[App\Http\Controllers\ConsumoClienteController::class,'store']);
Route::get('consumoClientes/{id}/destroy',[App\Http\Controllers\LocaisController::class,'destroy']);
Route::get('consumoClientes/{id}/edit',[App\Http\Controllers\LocaisController::class,'edit']);
Route::put('consumoClientes/{id}/update',[App\Http\Controllers\LocaisController::class,'update']);

//ConsumoProduto
Route::get('consumoProduto',[App\Http\Controllers\ConsumoProdutosController::class,'index'])->name('consumoProduto.listar');
Route::get('consumoProduto/create',[App\Http\Controllers\ConsumoProdutosController::class,'create'])->name('consumoProduto.criar');
Route::post('consumoProduto/store',[App\Http\Controllers\ConsumoProdutosController::class,'store']);
Route::get('consumoProduto/{id}/destroy',[App\Http\Controllers\LocaisController::class,'destroy']);
Route::get('consumoProduto/{id}/edit',[App\Http\Controllers\LocaisController::class,'edit']);
Route::put('consumoProduto/{id}/update',[App\Http\Controllers\LocaisController::class,'update']);

Route::get('usuarios',[App\Http\Controllers\UsuariosController::class,'index']);
Auth::routes();
