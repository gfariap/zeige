<?php

namespace Zeige\Services;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploadService
{

    public function salvarMarcaDoCliente(UploadedFile $foto, $nome = '')
    {
        return $this->salvar('logos', $foto, $nome);
    }


    public function salvar($tipo, UploadedFile $foto, $nome = '')
    {
        $nomeDoArquivo = Carbon::now()->timestamp;
        if (strlen($nome) > 0) {
            $nomeDoArquivo .= '_' . $this->trataNomeDoArquivo($nome);
        }
        $nomeDoArquivo .= '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path() . '/img/' . $tipo, $nomeDoArquivo);

        return $nomeDoArquivo;
    }


    private function trataNomeDoArquivo($nome)
    {
        return strtolower(str_replace(' ', '_', strtr(utf8_decode($nome),
            utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
            'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy')));
    }

}