<?php

namespace App\Http\Controllers;

use Request;
use App\Empresa;
use App\User;
use App\Comentario;
use App\Produto;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth',
                        ['only' => ['criar', 'armazenar', 'editar', 'deletar']]);
    }

    public function index()
    {
      $empresas = Empresa::all();
      return view('empresa/empresas')->with('empresas', $empresas);
    }

    public function empresasdousuario($id)
    {
      if (\Auth::id() == $id) {
        $empresas = Empresa::where('idUsuario', $id)->get();
        return view('empresa/empresas')->with('empresas', $empresas);
      }
      else {
        return redirect()->action('EmpresaController@index');
      }
    }

    public function criar()
    {
        return view('empresa/add');
    }

    public function armazenar(EmpresaRequest $request)
    {
        Empresa::create($request->all());
        return redirect()->action('EmpresaController@index')
                        ->withInput(Request::only('nome'));
    }

    public function mostrar($id)
    {
      $empresa = Empresa::find($id);
      $produtos = Produto::where('idEmpresa', $id)->get();
      $user = User::find($empresa->idUsuario);
      $users = User::all();
      $comentarios = Comentario::where([
                  ['empresa', '=', 1],
                  ['idTabela', '=', $id],
                  ['autorizar', '=', 1]
                ])->get();
      return view('empresa/detalhes', ['e' => $empresa,'u'=>$user,'us'=>$users,'c'=>$comentarios,'p'=>$produtos]);
    }

    public function editar($id)
    {
      $empresa = Empresa::find($id);
      return view('empresa/editar', ['e'=>$empresa]);
    }

    public function atualizar(Request $request, $id)
    {
        $novosdados = Request::all();
        $empresa = new Empresa();
        $empresa = Empresa::find($novosdados['id']);
        $empresa->nome = $novosdados['nome'];
        $empresa->imagem = $novosdados['imagem'];
        $empresa->contato = $novosdados['contato'];

        $empresa->save();
        return redirect()->action('EmpresaController@index');
    }

    public function deletar($id)
    {
      $empresa = Empresa::find($id);
      $empresa->delete();
      return redirect()->action('EmpresaController@index');
    }

    public function AdicionarComentario($id)
    {
      $params = Request::all();

      $comentario = new Comentario;
      $comentario->comentario = $params['comentario'];
      $comentario->autorizar =  $params['autorizar'];
      $comentario->nota = $params['nota'];
      $comentario->idUsuario = $params['idUsuario'];
      $comentario->empresa = $params['empresa'];
      $comentario->idTabela = $params['idTabela'];
      $comentario->save();

      $posts = Posts::find($id);

    }
}
