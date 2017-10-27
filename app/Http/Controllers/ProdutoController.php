<?php

namespace App\Http\Controllers;

use Request;
use App\Categoria;
use App\Produto;
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
      return view('produto/produto')->with('produtos', $produtos)->with('categorias', $categorias);
    }

    public function criar()
    {
        $categoria = Categoria::all();
        return view('produto/addproduto')->with('categoria', $categoria);
    }

    public function armazenar(Request $request)
    {
        Produto::create(Request::all());
        return redirect()->action('ProdutoController@criar');
    }

    public function mostrar($id)
    {

    }

    public function editar($id)
    {
      $produto = Produto::find($id);
      $categoria = Categoria::all();
      return view('produto/editarproduto', ['produto'=>$produto])->with($categoria, 'categoria');
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
      $produto->categoria = $novosdados['categoria'];

      $produto->save();
    }

    public function deletar($id)
    {
      $produto = Produto::find($id);
      $produto->delete();
      return redirect()->action('ProdutoController@index');
    }
}
