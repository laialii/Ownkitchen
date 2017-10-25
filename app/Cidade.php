<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'nome', 'estados_cod_estados'
    ];

    public function estado()
    {
        return $this->belongsTo('SGW\Estado');
    }

}
