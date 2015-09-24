<?php

namespace Zeige\Http\Controllers;

use Zeige\Http\Requests;
use Zeige\Http\Requests\ProjetoFormularioRequest;
use Zeige\Projeto;
use Zeige\Services\ImageUploadService;

class ProjetosController extends Controller
{

    /**
     * @var ImageUploadService
     */
    private $gerenciadorDeImagens;


    public function __construct(ImageUploadService $gerenciadorDeImagens)
    {
        $this->gerenciadorDeImagens = $gerenciadorDeImagens;
    }


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


    /**
     * Função que inclui um novo projeto no sistema.
     *
     * @param ProjetoFormularioRequest $request
     */
    public function adicionar(ProjetoFormularioRequest $request)
    {
        $nomeDoArquivo = $this->gerenciadorDeImagens->salvarMarcaDoCliente($request->file('imagem'), $request->cliente);

        $projeto         = new Projeto($request->all());
        $projeto->imagem = $nomeDoArquivo;
        $projeto->status = 1;
        $projeto->save();

        return redirect()->route('projetos.listar');
    }


    /**
     * Função que atualiza os dados de um projeto no sistema.
     *
     * @param ProjetoFormularioRequest $request
     * @param                          $id
     */
    public function atualizar(ProjetoFormularioRequest $request, $id)
    {
        $nomeDoArquivo = $this->gerenciadorDeImagens->salvarMarcaDoCliente($request->file('imagem'), $request->cliente);

        $projeto = Projeto::findOrFail($id);
        $projeto->fill($request->all());
        $projeto->imagem = $nomeDoArquivo;
        $projeto->save();

        return redirect()->route('projetos.listar');
    }

}
