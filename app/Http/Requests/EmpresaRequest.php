<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'nome.required' => 'O campo :attribute não pode ficar vazio.'
          'contato' => 'required|min:8'
        ];
    }

    public function messages(){
      return [
        'required' => 'O campo :attribute não pode ficar vazio.'
      ];
    }
}
