<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    function () {
        return redirect()->route('projetos.listar');
    }
]);

Route::group([ 'middleware' => 'guest' ], function () {
    Route::get('login', [ 'as' => 'login', 'uses' => 'PaginasController@login' ]);
    Route::post('login', [ 'as' => 'logar', 'uses' => 'PaginasController@logar' ]);
});

Route::group([ 'middleware' => 'auth' ], function () {
    Route::get('logout', [ 'as' => 'logout', 'uses' => 'PaginasController@logout' ]);

    Route::group([ 'prefix' => 'projetos', 'as' => 'projetos.' ], function () {
        Route::get('/', [ 'as' => 'listar', 'uses' => 'ProjetosController@listar' ]);
        Route::get('buscar', [ 'as' => 'buscar', 'middleware' => 'ajax', 'uses' => 'ProjetosController@buscar' ]);
        Route::get('incluir', [ 'as' => 'incluir', 'uses' => 'ProjetosController@incluir' ]);
        Route::post('/', [ 'as' => 'adicionar', 'uses' => 'ProjetosController@adicionar' ]);
        Route::get('{id}/editar', [ 'as' => 'editar', 'uses' => 'ProjetosController@editar' ]);
        Route::put('{id}', [ 'as' => 'atualizar', 'uses' => 'ProjetosController@atualizar' ]);
        Route::patch('{id}/ativar',
            [ 'as' => 'ativar', 'middleware' => 'ajax', 'uses' => 'ProjetosController@ativar' ]);
        Route::patch('{id}/desativar',
            [ 'as' => 'desativar', 'middleware' => 'ajax', 'uses' => 'ProjetosController@desativar' ]);
        Route::get('{id}', [ 'as' => 'dashboard', 'uses' => 'ProjetosController@dashboard' ]);
        Route::post('{id}/telas', [
            'as'         => 'adicionarTelas',
            'middleware' => 'ajax',
            'uses'       => 'ProjetosController@adicionarTelas'
        ]);
    });

    Route::group([ 'prefix' => 'telas', 'as' => 'telas.' ], function () {
        Route::get('{projeto_id}/buscar',
            [ 'as' => 'buscar', 'middleware' => 'ajax', 'uses' => 'TelasController@buscar' ]);
        Route::patch('titulos',
            [ 'as' => 'titulo', 'middleware' => 'ajax', 'uses' => 'TelasController@titulo' ]);
        Route::get('{id}', [ 'as' => 'tela', 'uses' => 'TelasController@tela' ]);
        Route::post('{id}/marcadores',
            [ 'as' => 'marcador', 'middleware' => 'ajax', 'uses' => 'TelasController@marcador' ]);
        Route::delete('{id}/marcadores/{marcador_id}',
            [ 'as' => 'excluirMarcador', 'middleware' => 'ajax', 'uses' => 'TelasController@excluirMarcador' ]);
        Route::post('{apresentacao_id}', [
            'as'         => 'adicionar',
            'middleware' => 'ajax',
            'uses'       => 'TelasController@adicionarTelas'
        ]);
        Route::put('{id}', [ 'as' => 'atualizar', 'middleware' => 'ajax', 'uses' => 'TelasController@atualizar' ]);
        Route::put('{id}/imagem', [ 'as' => 'imagem', 'uses' => 'TelasController@imagem' ]);
        Route::patch('{id}/ativar', [ 'as' => 'ativar', 'middleware' => 'ajax', 'uses' => 'TelasController@ativar' ]);
        Route::patch('{id}/desativar',
            [ 'as' => 'desativar', 'middleware' => 'ajax', 'uses' => 'TelasController@desativar' ]);
        Route::delete('{id}', [ 'as' => 'excluir', 'middleware' => 'ajax', 'uses' => 'TelasController@excluir' ]);
    });

});

Route::get('{codigo}/apresentacoes/{id}/telas/{tela_id}', [
    'as' => 'externo.tela',
    'middleware' => 'ajax',
    'uses' => 'ExternoController@tela'
]);
Route::get('{codigo}/apresentacoes/{id}/telas', [
    'as' => 'externo.telas',
    'middleware' => 'ajax',
    'uses' => 'ExternoController@telas'
]);
Route::get('{codigo}/apresentacoes/{dispositivo}', [
    'as' => 'externo.apresentacoes',
    'middleware' => 'ajax',
    'uses' => 'ExternoController@apresentacoes'
]);
Route::get('{codigo}', [ 'as' => 'externo', 'uses' => 'ExternoController@projeto' ]);
