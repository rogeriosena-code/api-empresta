<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValorEmprestimo;

class StoreCreditoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'valor_emprestimo' => 'required',
        ];
    }

    public function messages(){

        return [
            'valor_emprestimo.required' => 'O parâmetro valor emprestimo é obrigatório!'
        ];
    }
}
