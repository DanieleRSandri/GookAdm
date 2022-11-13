<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
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
            'data' => 'required|date',
            'status' => 'required',
            'horario_inicio'=> 'required',
            'horario_final'=> 'required',
            'id_quadra'=> 'required'
        ];
    }

    public function messages()
    {
        return [            
            'data.required' => 'A data deve ser informado.',
            'status.required' => 'O status deve ser informado.',
            'horario_inicio.required' => 'O horario inicio deve ser informado.',
            'horario_final.required' => 'O horario final deve ser informado.',
            'id_quadra.required' => 'A quadra deve ser informado.',

        ];
    }
}
