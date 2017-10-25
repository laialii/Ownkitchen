<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Estado;

class CidadesController extends Controller
{
private $estadoModel;
 public function __construct(Estado $estado)
 {
     $this->estadoModel = $estado;
 }

 public function getCidades()
 {
     $estado = $this->estadoModel->findOrFail(13);
     $cidades = $estado->cidades()->getQuery()->get(['id', 'cidade']);
     return Response::json($cidades);
 }

 public function estado()
 {
    return $this->belongsTo('SGW\Estado', 'estado_id')
 }
}
