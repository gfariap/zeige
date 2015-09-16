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

Route::get('login', [ 'as' => 'login', 'uses' => 'PaginasController@login', 'middleware' => 'guest' ]);
Route::post('login', [ 'as' => 'logar', 'uses' => 'PaginasController@logar', 'middleware' => 'guest' ]);
Route::get('logout', [ 'as' => 'logout', 'uses' => 'PaginasController@logout', 'middleware' => 'auth' ]);
Route::get('projetos', [ 'as' => 'projetos.listar', 'uses' => 'ProjetosController@listar', 'middleware' => 'auth' ]);
Route::get('projetos/{id}',
    [ 'as' => 'projetos.dashboard', 'uses' => 'ProjetosController@dashboard', 'middleware' => 'auth' ]);
Route::get('projetos/{projeto_id}/telas/{id}',
    [ 'as' => 'projetos.tela', 'uses' => 'ProjetosController@tela', 'middleware' => 'auth' ]);