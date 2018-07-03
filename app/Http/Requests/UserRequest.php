<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'nascimento' => 'required',
        'cpf' => 'required',
        'cep' => 'required',
        'rua' => 'required',
        'bairro' => 'required',
        'numero' => 'required|numeric',
        'imagem' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'celular' => 'required',
        'telefone' => 'required',
      ];
    }

    public function messages(){
      return [
        'required' => 'O campo :attribute não pode ficar vazio.'
      ];
    }
}
