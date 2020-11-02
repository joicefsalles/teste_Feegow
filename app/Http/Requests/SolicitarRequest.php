<?php

namespace App\Http\Requests;

use App\Models\Solicitar;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SolicitarRequest extends FormRequest
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
    public function rules(Solicitar $solicitar)
    {
        return [
            'CPF' => 'required|cpf',
            'nome' => 'required',
            'id_origem' => 'required',
            'nascimento' => 'required|date_format:d/m/Y|before:18 years ago',
        ];
    }


    public function messages()
    {
        return [
            'nome.required' => 'Nome Obrigatório',
            'CPF.required' => 'CPF Obrigatório',
            'nascimento.required' => 'Data de nascimento Obrigatório',
            'id_origem.required' => 'Campo "Como conheceu?" e Obrigatório',
            'CPF.cpf' => 'CPF Inválido',
        ];
    }
}
