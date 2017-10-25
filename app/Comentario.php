<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'comentario', 'nota', 'autorizar', 'idTabela', 'idUsuario', 'empresa'
    ];
}
