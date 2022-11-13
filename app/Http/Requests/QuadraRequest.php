<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuadraRequest extends FormRequest
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
            'tipo' => 'required|min:5',
            'valorTempo' =>'required',
            'id_local' =>'required',
        ];
    }

    public function messages()
    {
        return [            
            'nome.required' => 'O nome da quadra deve ser informado.',
            'tipo.required' => 'O tipo da quadra deve ser informado.',
            'valorTempo.required' => 'O valor do tempo deve ser informado.',
            'id_local.required' => 'O local deve ser informado.',

        ];
    }
}
