<?php

namespace Zeige\Http\Controllers;

use Zeige\Http\Requests;

class ProjetosController extends Controller
{

    public function listar()
    {
        return view('projetos.listar');
    }


    public function dashboard($id)
    {
        return view('projetos.dashboard');
    }


    public function tela($projeto_id, $id)
    {
        return view('projetos.tela');
    }

}
