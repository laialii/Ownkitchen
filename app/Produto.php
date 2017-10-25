<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  protected $fillable = [
      'titulo', 'descricao', 'preco',
      'idEmpresa', 'idCategoria', 'imagem'
  ];
}
