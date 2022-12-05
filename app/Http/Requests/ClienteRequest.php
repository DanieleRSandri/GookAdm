<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|min:5',
            'endereco' => 'required',
            'telefone' => 'required',
            'cpf' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome deve ser informado.',
            'endereco.required' => 'O endereço deve ser informado.',
            'telefone.required' => 'O telefone deve ser informado.',
            'cpf.required' => 'O CPF deve ser informado.'

        ];
    }
}
