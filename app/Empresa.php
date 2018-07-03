<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $fillable = [
      'nome', 'idUsuario', 'contato', 'imagem'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function likes(){
    return $this->belongsTo('App\Like');
  }
}
