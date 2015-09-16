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
        Route::get('incluir', [ 'as' => 'incluir', 'uses' => 'ProjetosController@incluir' ]);
        Route::get('{id}/editar', [ 'as' => 'editar', 'uses' => 'ProjetosController@editar' ]);
        Route::get('{id}', [ 'as' => 'dashboard', 'uses' => 'ProjetosController@dashboard' ]);
        Route::get('{projeto_id}/telas/{id}', [ 'as' => 'tela', 'uses' => 'ProjetosController@tela' ]);
    });

});