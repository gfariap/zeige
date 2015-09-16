<?php

namespace Zeige\Http\Controllers;

use Zeige\Http\Requests;
use Zeige\Projeto;

class ProjetosController extends Controller
{

    /**
     * Exibe a tela de listagem de projetos.
     *
     * @return \Illuminate\View\View
     */
    public function listar()
    {
        $ativos   = Projeto::ativos()->get();
        $inativos = Projeto::inativos()->get();

        return view('projetos.listar', compact('ativos', 'inativos'));
    }


    /**
     * Exibe o formulário de inclusão de projetos.
     *
     * @return \Illuminate\View\View
     */
    public function incluir()
    {
        return view('projetos.incluir');
    }


    /**
     * Exibe o formulário de edição de projetos.
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function editar($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projetos.editar', compact('projeto'));
    }


    /**
     * Exibe o dashboard do projeto.
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function dashboard($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projetos.dashboard', compact('projeto'));
    }


    /**
     * Exibe uma tela específica de um projeto.
     *
     * @param $projeto_id
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function tela($projeto_id, $id)
    {
        return view('projetos.tela');
    }

}
