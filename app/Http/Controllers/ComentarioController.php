<?php

namespace App\Http\Controllers;

use Request;
use App\Comentario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    public function index()
    {
        //
    }

    public function criar()
    {
        return view('addcomentario');
    }

    public function armazenar(Request $request)
    {
      Comentario::create(Request::all());
      return redirect()->action('ComentarioController@criar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        return view('editarcomentario');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
      $novosdados = Request::all();
      $comentario = new Comentario();
      $comentario = Comentario::find($novosdados['id']);
      $comentario->nome = $novosdados['nome'];
      $comentario->nota = $novosdados['nota'];

      $comentario->save();
    }

    public function deletar($id)
    {
      $comentario = Comentario::find($id);
      $comentario->delete();
      return redirect()->action('ComentarioController@index');
    }
}
