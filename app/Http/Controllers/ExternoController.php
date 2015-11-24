<?php

namespace Zeige\Http\Controllers;

use DB;
use Zeige\Apresentacao;
use Zeige\Http\Requests;
use Zeige\Projeto;
use Zeige\Tela;

class ExternoController extends Controller
{

    /**
     * Exibe a página de visualização externa do projeto.
     *
     * @param $codigo
     *
     * @return \Illuminate\View\View
     */
    public function projeto($codigo)
    {
        $projeto = Projeto::where('codigo', '=', $codigo)->firstOrFail();

        if ($projeto->desktop()->count()) {
            $principal = 'desktop';
        } else {
            if ($projeto->tablet()->count()) {
                $principal = 'tablet';
            } else {
                if ($projeto->mobile()->count()) {
                    $principal = 'mobile';
                } else {
                    abort(404);
                }
            }
        }

        return view('paginas.externo', compact('projeto', 'principal'));
    }


    /**
     * Retorna uma lista de apresentações de um dispositivo de um projeto.
     *
     * @param $codigo
     * @param $dispositivo
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function apresentacoes($codigo, $dispositivo)
    {
        return Apresentacao::whereHas('projeto', function ($query) use ($codigo) {
                $query->where('codigo', '=', $codigo);
            })->where('dispositivo', '=', $dispositivo)
            ->select(DB::raw('versao as text'), DB::raw('id as value'))
            ->get();
    }


    /**
     * Retorna uma lista de telas de uma determinada apresentação.
     *
     * @param $codigo
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function telas($codigo, $id)
    {
        return Tela::where('apresentacao_id', '=', $id)
            ->orderBy('ordem')
            ->select(DB::raw('titulo as text'), DB::raw('id as value'))
            ->get();
    }


    /**
     * Retorna todas as informações e os marcadores de determinada tela.
     *
     * @param $codigo
     * @param $id
     * @param $tela_id
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function tela($codigo, $id, $tela_id)
    {
        return Tela::with('marcadores')
            ->find($tela_id);
    }
}
