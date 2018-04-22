<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;
use App\User;
use App\Comentario;
use App\Empresa;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth',
                        ['only' => ['criar', 'editar', 'deletar']]);
    }

    public function index()
    {
      $produtos = Produto::all();
      $categorias = Categoria::all();
      return view('produto/produtos')->with('produtos', $produtos)->with('categorias', $categorias);
    }

    public function criar($id)
    {
        $categoria = Categoria::all();
        return view('produto/add')->with('categoria', $categoria)->with('idEmpresa', $id);
    }

    public function armazenar(ProdutoRequest $request)
    {
        $this->validate{$request, ['titulo' => 'required',
          'descricao' => 'required',
          'preco' => 'required|numeric',
          'idCategoria' => 'required',
          'imagem' => 'image']}
        Produto::create($request->all());
        return redirect()->action('EmpresaController@mostrar', $request->input('idEmpresa'));
    }

    public function mostrar($id)
    {
      $produto = Produto::find($id);
      $arquivo = Storage::get($produto->imagem);
      $empresa = Empresa::find($produto->idEmpresa);
      $categoria = Categoria::all();
      $user = User::all();
      $comentarios = Comentario::where([
                    ['empresa', '=', 0],
                    ['idTabela', '=', $id]
                  ])->get();
      return view('produto/detalhes',['p'=>$produto, 'us'=>$user,'comentario'=>$comentarios,'e'=>$empresa,'c'=>$categoria]);
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
