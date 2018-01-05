<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'titulo' => 'required|min:3',
        'descricao' => 'required|max:500',
        'preco' => 'required|numeric',
        'idCategoria' => 'required',
        'imagem' => 'required'
      ];
    }

    public function messages(){
      return [
        'required' => 'O campo :attribute não pode ficar vazio.'
      ];
    }
}
