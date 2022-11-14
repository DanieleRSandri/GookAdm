<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'required|min:11|numeric',
            'cnpj' => 'required|min:14|numeric'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do local deve ser informado.',
            'endereco.required' => 'O e-endereço  do local deve ser informado.',
            'telefone.required' => 'O telefone deve ser informado.',
            'cnpj.required' => 'O CNPJ deve ser informado.',

        ];
    }
}
