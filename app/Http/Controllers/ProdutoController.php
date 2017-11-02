<?php

namespace App\Http\Controllers;

use Request;
use App\Categoria;
use App\Produto;
use App\User;
use App\Comentario;
use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function index()
    {
      $produtos = Produto::all();
      $categorias = Categoria::all();
      return view('produto/produtos')->with('produtos', $produtos)->with('categorias', $categorias);
    }

    public function criar()
    {
        $categoria = Categoria::all();
        return view('produto/add')->with('categoria', $categoria);
    }

    public function armazenar(Request $request)
    {
        Produto::create(Request::all());
        return redirect()->action('ProdutoController@index');
    }

    public function mostrar($id)
    {
      $produto = Produto::find($id);
      $empresa = Empresa::all();
      $categoria = Categoria::all();
      $user = User::find($id);
      $comentarios = Comentario::where('empresa', '=', 0, 'and', 'idTabela', '=', $id)->first();
      return view('produto/detalhes')->with('p', $produto)->with('u', $user)->with('c', $comentarios)
                                      ->with('e', $empresa)->with('c', $categoria);
    }

    public function editar($id)
    {
      $produto = Produto::find($id);
      $categoria = Categoria::all();
      return view('produto/editar', ['produto'=>$produto])->with('categoria',$categoria);
    }

    public function atualizar(Request $request, $id)
    {
      $novosdados = Request::all();
      $produto = new Produto();
      $produto = Produto::find($novosdados['id']);
      $produto->titulo = $novosdados['titulo'];
      $produto->imagem = $novosdados['imagem'];
      $produto->descricao = $novosdados['descricao'];
      $produto->preco = $novosdados['preco'];
      $produto->idCategoria = $novosdados['idCategoria'];

      $produto->save();
      return redirect()->action('ProdutoController@index');
    }

    public function deletar($id)
    {
      $produto = Produto::find($id);
      $produto->delete();
      return redirect()->action('ProdutoController@index');
    }
}
