<?php

namespace App\Http\Controllers;

use Request;
use App\Comentario;
use App\User;
use App\Empresa;
use App\Produto;
use EmpresaController;
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

    public function comentarEmEmpresa($id)
    {
        Comentario::create(Request::all());
        return redirect()->action('EmpresaController@mostrar', $id);
    }

    public function comentarEmProduto()
    {
        $usuario = app('Illuminate\Contracts\Auth\Guard')->user();
        $empresa = Empresa::all();
        $produto = Produto::all();
        return view('addcomentario')->with('usuario', $usuario)->with('empresa', $empresa)->with('produto', $produto);
    }

    public function armazenar(Request $request)
    {
      Comentario::create(Request::all());
      return redirect()->action('ComentarioController@criar');
    }


    public function mostrar($id)
    {
        //
    }

    public function editar($id)
    {
        return view('editarcomentario');
    }


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
