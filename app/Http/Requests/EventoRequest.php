<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'data_evento' => 'required|nullable|date',
            'descricao' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Por favor, insira nome do evento',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
            'data_evento.required' => 'Por favor, insira data do evento',
            'descricao.required' => 'Por favor, insira descrição do evento',
            'descricao.min' => 'O descrição deve ter pelo menos 3 caracteres',
        ];
    }
}
