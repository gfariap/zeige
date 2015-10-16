<?php

namespace Zeige\Http\Requests;

class ApresentacaoFormularioRequest extends Request
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
        $rules = [
            'dispositivo' => 'required|in:desktop,tablet,mobile',
            'versao'      => 'required|max:255',
            'file'        => 'required|array|min:1'
        ];

        return $rules;
    }
}
