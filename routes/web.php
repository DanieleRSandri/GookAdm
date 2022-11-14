<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'locais', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('',             ['as' => 'locais',           'uses' => 'App\Http\Controllers\LocaisController@index']);
        Route::get('create',       ['as' => 'locais.create',    'uses' => 'App\Http\Controllers\LocaisController@create']);
        Route::get('{id}/destroy', ['as' => 'locais.destroy',   'uses' => 'App\Http\Controllers\LocaisController@destroy']);
        Route::get('edit',         ['as' => 'locais.edit',      'uses' => 'App\Http\Controllers\LocaisController@edit']);
        Route::put('{id}/update',  ['as' => 'locais.update',    'uses' => 'App\Http\Controllers\LocaisController@update']);
        Route::post('store',       ['as' => 'locais.store',     'uses' => 'App\Http\Controllers\LocaisController@store']);
    });

    Route::group(['prefix' => 'quadras', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',             ['as' => 'quadras',          'uses' => 'App\Http\Controllers\QuadrasController@index']);
        Route::get('create',       ['as' => 'quadras.create',   'uses' => 'App\Http\Controllers\QuadrasController@create']);
        Route::get('{id}/destroy', ['as' => 'quadras.destroy',  'uses' => 'App\Http\Controllers\QuadrasController@destroy']);
        Route::get('edit',         ['as' => 'quadras.edit',     'uses' => 'App\Http\Controllers\QuadrasController@edit']);
        Route::put('{id}/update',  ['as' => 'quadras.update',   'uses' => 'App\Http\Controllers\QuadrasController@update']);
        Route::post('store',       ['as' => 'quadras.store',    'uses' => 'App\Http\Controllers\QuadrasController@store']);
    });

    Route::group(['prefix' => 'usuarios', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',             ['as' => 'usuarios',         'uses' => 'App\Http\Controllers\UsuariosController@index']);
        Route::get('create',       ['as' => 'usuarios.create',  'uses' => 'App\Http\Controllers\UsuariosController@create']);
        Route::get('{id}/destroy', ['as' => 'usuarios.destroy', 'uses' => 'App\Http\Controllers\UsuariosController@destroy']);
        Route::get('edit',         ['as' => 'usuarios.edit',    'uses' => 'App\Http\Controllers\UsuariosController@edit']);
        Route::put('{id}/update',  ['as' => 'usuarios.update',  'uses' => 'App\Http\Controllers\UsuariosController@update']);
        Route::post('store',       ['as' => 'usuarios.store',   'uses' => 'App\Http\Controllers\UsuariosController@store']);
    });

    Route::group(['prefix' => 'produtos', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',             ['as' => 'produtos',         'uses' => 'App\Http\Controllers\ProdutosController@index']);
        Route::get('create',       ['as' => 'produtos.create',  'uses' => 'App\Http\Controllers\ProdutosController@create']);
        Route::get('{id}/destroy', ['as' => 'produtos.destroy', 'uses' => 'App\Http\Controllers\ProdutosController@destroy']);
        Route::get('edit',         ['as' => 'produtos.edit',    'uses' => 'App\Http\Controllers\ProdutosController@edit']);
        Route::put('{id}/update',  ['as' => 'produtos.update',  'uses' => 'App\Http\Controllers\ProdutosController@update']);
        Route::post('store',       ['as' => 'produtos.store',   'uses' => 'App\Http\Controllers\ProdutosController@store']);
    });

    Route::group(['prefix' => 'consumos', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('',             ['as' => 'consumos',         'uses' => 'App\Http\Controllers\ConsumoController@index']);
        Route::get('create',       ['as' => 'consumos.create',  'uses' => 'App\Http\Controllers\ConsumoController@create']);
        Route::post('store',       ['as' => 'consumos.store',   'uses' => 'App\Http\Controllers\ConsumoController@store']);
        Route::get('edit',         ['as' => 'consumos.edit',    'uses' => 'App\Http\Controllers\ConsumoController@edit']);
        Route::get('{id}/destroy', ['as' => 'consumos.destroy', 'uses' => 'App\Http\Controllers\ConsumoController@destroy']);
        Route::put('{id}/update',  ['as' => 'consumos.update',  'uses' => 'App\Http\Controllers\ConsumoController@update']);
    });

    Route::group(['prefix' => 'clientes', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',             ['as' => 'clientes',         'uses' => 'App\Http\Controllers\ClientesController@index']);
        Route::get('create',       ['as' => 'clientes.create',  'uses' => 'App\Http\Controllers\ClientesController@create']);
        Route::get('{id}/destroy', ['as' => 'clientes.destroy', 'uses' => 'App\Http\Controllers\ClientesController@destroy']);
        Route::get('edit',         ['as' => 'clientes.edit',    'uses' => 'App\Http\Controllers\ClientesController@edit']);
        Route::put('{id}/update',  ['as' => 'clientes.update',  'uses' => 'App\Http\Controllers\ClientesController@update']);
        Route::post('store',       ['as' => 'clientes.store',   'uses' => 'App\Http\Controllers\ClientesController@store']);
    });

    Route::group(['prefix' => 'agendas', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('',             ['as' => 'agendas',          'uses' => 'App\Http\Controllers\AgendasController@index']);
        Route::get('create',       ['as' => 'agendas.create',   'uses' => 'App\Http\Controllers\AgendasController@create']);
        Route::get('{id}/destroy', ['as' => 'agendas.destroy',  'uses' => 'App\Http\Controllers\AgendasController@destroy']);
        Route::get('{id}/edit',    ['as' => 'agendas.edit',     'uses' => 'App\Http\Controllers\AgendasController@edit']);
        Route::put('{id}/update',  ['as' => 'agendas.update',   'uses' => 'App\Http\Controllers\AgendasController@update']);
        Route::post('store',       ['as' => 'agendas.store',    'uses' => 'App\Http\Controllers\AgendasController@store']);
    });

    Route::group(['prefix' => 'relatorios', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('agendamentosDiario',  ['as' => 'relatorios.agendamentosDiario',  'uses' => 'App\Http\Controllers\RelatoriosController@agendamentosDiario']);
        Route::get('agendamentosSemanal', ['as' => 'relatorios.agendamentosSemanal', 'uses' => 'App\Http\Controllers\RelatoriosController@agendamentosSemanal']);
        Route::get('agendamentosMensal',  ['as' => 'relatorios.agendamentosMensal',  'uses' => 'App\Http\Controllers\RelatoriosController@agendamentosMensal']);
        Route::post('agendamentos',       ['as' => 'relatorios.agendamentos',        'uses' => 'App\Http\Controllers\RelatoriosController@agendamentos']);
        Route::get('clientes',            ['as' => 'relatorios.cliente',             'uses' => 'App\Http\Controllers\RelatoriosController@cliente']);
    });
});

Auth::routes();
