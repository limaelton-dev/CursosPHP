<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:3']
            //poderia colocar mais validações aqui também
        ];
    }

    //para criar mensagens personalizadas em relação aos campos
    // public function messages()
    // {
    //     return [
    //         'nome.required' => 'Informe o nome da série!',
    //         'nome.min' => 'O nome da série deve ter pelo menos :min caracteres'
    //     ];

    //      outra forma seria fazer
            // [ 'nome.*' => 'mensagem aqui']
    // }
}
