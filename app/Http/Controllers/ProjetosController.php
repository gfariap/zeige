<?php

namespace Zeige\Http\Controllers;

use Carbon\Carbon;
use Zeige\Apresentacao;
use Zeige\Http\Requests;
use Zeige\Http\Requests\ApresentacaoFormularioRequest;
use Zeige\Http\Requests\ProjetoFormularioRequest;
use Zeige\Projeto;
use Zeige\Services\ImageUploadService;
use Zeige\Tela;

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
     * Retorna a lista de projetos cadastrados no sistema como JSON.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function buscar()
    {
        return Projeto::all();
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
     * Função que inclui um novo projeto no sistema.
     *
     * @param ProjetoFormularioRequest $request
     */
    public function adicionar(ProjetoFormularioRequest $request)
    {
        $nomeDoArquivo = $this->gerenciadorDeImagens->salvarMarcaDoCliente($request->file('imagem'), $request->cliente);

        $projeto = new Projeto($request->all());

        $projeto->imagem = $nomeDoArquivo;
        $projeto->codigo = $this->gerarCodigoCliente();
        $projeto->status = 1;
        $projeto->save();

        alert()->success('Projeto cadastrado!', 'Sucesso!');

        return redirect()->route('projetos.listar');
    }


    /**
     * Função que gera o código único de acesso do cliente.
     *
     * @return string
     */
    private function gerarCodigoCliente()
    {
        return sha1(Carbon::now()->timestamp);
    }


    /**
     * Função que inclui uma nova apresentação de um projeto, junto com todas as suas telas.
     *
     * @param ApresentacaoFormularioRequest $request
     */
    public function adicionarTelas(ApresentacaoFormularioRequest $request, $id)
    {
        $apresentacao = new Apresentacao($request->all());

        $apresentacao->projeto_id = $id;
        $apresentacao->save();

        foreach ($request->file('file') as $index => $arquivo) {
            $nomeDoArquivo = $this->gerenciadorDeImagens->salvarTelaDeApresentacao($arquivo, $index . $request->versao);

            $tela = new Tela;

            $tela->imagem          = $nomeDoArquivo;
            $tela->titulo          = $arquivo->getClientOriginalName();
            $tela->status          = 1;
            $tela->ordem           = $index;
            $tela->apresentacao_id = $apresentacao->id;
            $tela->save();
        }

        alert()->success('Apresentação salva!', 'Sucesso!');

        return response('Salvo com sucesso.');
    }


    /**
     * Função que atualiza os dados de um projeto no sistema.
     *
     * @param ProjetoFormularioRequest $request
     * @param                          $id
     */
    public function atualizar(ProjetoFormularioRequest $request, $id)
    {
        $projeto = Projeto::findOrFail($id);

        $projeto->fill($request->all());

        if ($request->file('imagem')) {
            $nomeDoArquivo   = $this->gerenciadorDeImagens->salvarMarcaDoCliente($request->file('imagem'),
                $request->cliente);
            $projeto->imagem = $nomeDoArquivo;
        }

        $projeto->save();

        alert()->success('Projeto atualizado!', 'Sucesso!');

        return redirect()->route('projetos.listar');
    }


    /**
     * Função para desativar um projeto.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function desativar($id)
    {
        $projeto = Projeto::findOrFail($id);

        $projeto->status = 0;
        $projeto->save();

        return response('Projeto desativado com sucesso!');
    }


    /**
     * Função para ativar um projeto.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function ativar($id)
    {
        $projeto = Projeto::findOrFail($id);

        $projeto->status = 1;
        $projeto->save();

        return response('Projeto ativado com sucesso!');
    }

}
