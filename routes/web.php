<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::middleware('can:Administrador')->group(function () {
  
        Route::group(['prefix'=>'locais', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'locais',          'uses'=>'App\Http\Controllers\LocaisController@index']);
            Route::get('create',      ['as'=>'locais.create',    'uses'=>'App\Http\Controllers\LocaisController@create']);
            Route::get('{id}/destroy',['as'=>'locais.destroy',  'uses'=>'App\Http\Controllers\LocaisController@destroy']);
            Route::get('{id}/edit',   ['as'=>'locais.edit',     'uses'=>'App\Http\Controllers\LocaisController@edit']);
            Route::put('{id}/update', ['as'=>'locais.update',   'uses'=>'App\Http\Controllers\LocaisController@update']);
            Route::post('store',      ['as'=>'locais.store',    'uses'=>'App\Http\Controllers\LocaisController@store']);
        });
    
        Route::group(['prefix'=>'quadras', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'quadras',          'uses'=>'App\Http\Controllers\QuadrasController@index']);
            Route::get('create',      ['as'=>'quadras.create',    'uses'=>'App\Http\Controllers\QuadrasController@create']);
            Route::get('{id}/destroy',['as'=>'quadras.destroy',  'uses'=>'App\Http\Controllers\QuadrasController@destroy']);
            Route::get('{id}/edit',   ['as'=>'quadras.edit',     'uses'=>'App\Http\Controllers\QuadrasController@edit']);
            Route::put('{id}/update', ['as'=>'quadras.update',   'uses'=>'App\Http\Controllers\QuadrasController@update']);
            Route::post('store',      ['as'=>'quadras.store',    'uses'=>'App\Http\Controllers\QuadrasController@store']);
        });

        Route::group(['prefix'=>'usuarios', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'usuarios',          'uses'=>'App\Http\Controllers\UsuariosController@index']);
            Route::get('create',      ['as'=>'usuarios.create',    'uses'=>'App\Http\Controllers\UsuariosController@create']);
            Route::get('{id}/destroy',['as'=>'usuarios.destroy',  'uses'=>'App\Http\Controllers\UsuariosController@destroy']);
            Route::get('{id}/edit',   ['as'=>'usuarios.edit',     'uses'=>'App\Http\Controllers\UsuariosController@edit']);
            Route::put('{id}/update', ['as'=>'usuarios.update',   'uses'=>'App\Http\Controllers\UsuariosController@update']);
            Route::post('store',      ['as'=>'usuarios.store',    'uses'=>'App\Http\Controllers\UsuariosController@store']);
        });
        
        Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'produtos',          'uses'=>'App\Http\Controllers\ProdutosController@index']);
            Route::get('create',      ['as'=>'produtos.create',    'uses'=>'App\Http\Controllers\ProdutosController@create']);
            Route::get('{id}/destroy',['as'=>'produtos.destroy',  'uses'=>'App\Http\Controllers\ProdutosController@destroy']);
            Route::get('{id}/edit',   ['as'=>'produtos.edit',     'uses'=>'App\Http\Controllers\ProdutosController@edit']);
            Route::put('{id}/update', ['as'=>'produtos.update',   'uses'=>'App\Http\Controllers\ProdutosController@update']);
            Route::post('store',      ['as'=>'produtos.store',    'uses'=>'App\Http\Controllers\ProdutosController@store']);
        });
        
        Route::group(['prefix'=>'consumoClientes', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'consumoClientes',          'uses'=>'App\Http\Controllers\ConsumoClienteController@index']);
            Route::get('create',      ['as'=>'consumoClientes.create',    'uses'=>'App\Http\Controllers\ConsumoClienteController@create']);
            Route::get('{id}/destroy',['as'=>'consumoClientes.destroy',  'uses'=>'App\Http\Controllers\ConsumoClienteController@destroy']);
            Route::get('{id}/edit',   ['as'=>'consumoClientes.edit',     'uses'=>'App\Http\Controllers\ConsumoClienteController@edit']);
            Route::put('{id}/update', ['as'=>'consumoClientes.update',   'uses'=>'App\Http\Controllers\ConsumoClienteController@update']);
            Route::post('store',      ['as'=>'consumoClientes.store',    'uses'=>'App\Http\Controllers\ConsumoClienteController@store']);
        });
        
        Route::group(['prefix'=>'consumoProdutos', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'consumoProdutos',          'uses'=>'App\Http\Controllers\ConsumoProdutoController@index']);
            Route::get('create',      ['as'=>'consumoProdutos.create',    'uses'=>'App\Http\Controllers\ConsumoProdutoController@create']);
            Route::get('{id}/destroy',['as'=>'consumoProdutos.destroy',  'uses'=>'App\Http\Controllers\ConsumoProdutoController@destroy']);
            Route::get('{id}/edit',   ['as'=>'consumoProdutos.edit',     'uses'=>'App\Http\Controllers\ConsumoProdutoController@edit']);
            Route::put('{id}/update', ['as'=>'consumoProdutos.update',   'uses'=>'App\Http\Controllers\ConsumoProdutoController@update']);
            Route::post('store',      ['as'=>'consumoProdutos.store',    'uses'=>'App\Http\Controllers\ConsumoProdutoController@store']);
        });
            
    // });

    // Route::middleware('can:Administrador,Usuario')->group(function () {
        Route::group(['prefix'=>'clientes', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'clientes',          'uses'=>'App\Http\Controllers\ClientesController@index']);
            Route::get('create',      ['as'=>'clientes.create',    'uses'=>'App\Http\Controllers\ClientesController@create']);
            Route::get('{id}/destroy',['as'=>'clientes.destroy',  'uses'=>'App\Http\Controllers\ClientesController@destroy']);
            Route::get('{id}/edit',   ['as'=>'clientes.edit',     'uses'=>'App\Http\Controllers\ClientesController@edit']);
            Route::put('{id}/update', ['as'=>'clientes.update',   'uses'=>'App\Http\Controllers\ClientesController@update']);
            Route::post('store',      ['as'=>'clientes.store',    'uses'=>'App\Http\Controllers\ClientesController@store']);
        });
        
        Route::group(['prefix'=>'agendas', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('',            ['as'=>'agendas',          'uses'=>'App\Http\Controllers\AgendasController@index']);
            Route::get('create',      ['as'=>'agendas.create',    'uses'=>'App\Http\Controllers\AgendasController@create']);
            Route::get('{id}/destroy',['as'=>'agendas.destroy',  'uses'=>'App\Http\Controllers\AgendasController@destroy']);
            Route::get('{id}/edit',   ['as'=>'agendas.edit',     'uses'=>'App\Http\Controllers\AgendasController@edit']);
            Route::put('{id}/update', ['as'=>'agendas.update',   'uses'=>'App\Http\Controllers\AgendasController@update']);
            Route::post('store',      ['as'=>'agendas.store',    'uses'=>'App\Http\Controllers\AgendasController@store']);
                  });

        Route::get('gerarPdf/agenda',      ['as'=>'agendas.geraPdf',    'uses'=>'App\Http\Controllers\AgendasController@geraPdf']);

        
    // });
 

});

Auth::routes();
