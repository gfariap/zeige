<?php

namespace Zeige\Http\Requests;

class ProjetoFormularioRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'cliente' => 'required|max:255',
            'email' => 'required|email|max:255',
            'imagem' => 'mimes:jpeg,png'
        ];
    }
}
