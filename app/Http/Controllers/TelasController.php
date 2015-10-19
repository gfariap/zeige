<?php

namespace Zeige\Http\Controllers;

use Illuminate\Http\Request;
use Zeige\Apresentacao;
use Zeige\Http\Requests;
use Zeige\Services\ImageUploadService;
use Zeige\Tela;

class TelasController extends Controller
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
     * Exibe uma tela específica de um projeto.
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function tela($id)
    {
        $tela = Tela::findOrFail($id);

        return view('projetos.tela', compact('tela'));
    }


    /**
     * Retorna a lista de telas de determinada apresentação como JSON.
     *
     * @param $projeto_id
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function buscar($projeto_id)
    {
        return Tela::whereHas('apresentacao', function ($query) use ($projeto_id) {
            $query->where('projeto_id', '=', $projeto_id);
        })->get();
    }


    public function atualizar(Request $request, $id)
    {

    }


    /**
     * Atualiza a imagem de determinada tela.
     *
     * @return int|string
     */
    public function imagem(Request $request, $id)
    {
        $tela = Tela::findOrFail($id);

        $nomeDoArquivo = $this->gerenciadorDeImagens->salvarTelaDeApresentacao($request->file('file'));
        $tela->imagem  = $nomeDoArquivo;

        $tela->save();

        alert()->success('Tela alterada!', 'Sucesso!');

        return redirect()->back();
    }


    /**
     * Função para desativar uma tela.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function desativar($id)
    {
        $tela = Tela::findOrFail($id);

        $tela->status = 0;
        $tela->save();

        return response('Tela desativada com sucesso!');
    }


    /**
     * Função para ativar uma tela.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function ativar($id)
    {
        $tela = Tela::findOrFail($id);

        $tela->status = 1;
        $tela->save();

        return response('Tela ativada com sucesso!');
    }


    /**
     * Função para excluir uma tela.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function excluir($id)
    {
        $tela = Tela::findOrFail($id);

        $tela->delete();

        return response('Tela excluída!');
    }


    /**
     * Função que inclui telas em determinada apresentação.
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function adicionarTelas(Request $request, $id)
    {
        $apresentacao = Apresentacao::findOrFail($id);

        foreach ($request->file('file') as $index => $arquivo) {
            $nomeDoArquivo = $this->gerenciadorDeImagens->salvarTelaDeApresentacao($arquivo,
                $index . $apresentacao->versao);

            $tela = new Tela;

            $tela->imagem          = $nomeDoArquivo;
            $tela->titulo          = $arquivo->getClientOriginalName();
            $tela->status          = 1;
            $tela->ordem           = $index;
            $tela->apresentacao_id = $apresentacao->id;
            $tela->save();
        }

        alert()->success('Telas adicionadas!', 'Sucesso!');

        return response('Salvo com sucesso.');
    }


}