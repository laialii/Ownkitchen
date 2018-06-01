<?php

namespace App\Http\Controllers;

use Request;
use App\Empresa;
use App\Produto;
use App\User;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth',
    ['only' => ['perfil', 'editar', 'atualizar']]);
  }
  public function index()
  {
    $empresas = Empresa::orderBy('created_at', 'asc')->take(10)->get();
    $produtos = Produto::orderBy('created_at', 'asc')->take(10)->get();
    $user = User::all();
    $todasempresas = Empresa::all();
    return view('home', ['empresas'=>$empresas,
    'produtos'=>$produtos,
    'user'=>$user,
    'todasempresas'=>$todasempresas
  ]);
  }
  public function perfil()
  {
    $user = User::find(\Auth::id());
    return view('auth/perfil')->with('user', $user);
  }
  public function editar($id)
  {
    $user = User::find($id);
    return view('auth/editar', ['user'=>$user]);
  }

  public function atualizar(Request $request, $id)
  {
    $novosdados = Request::all();
    $user = new User();
    $user = User::find($novosdados['id']);
    $user->name = $novosdados['name'];
    $user->email = $novosdados['email'];
    $user->nascimento = $novosdados['nascimento'];
    $user->cpf = $novosdados['cpf'];
    $user->rua = $novosdados['rua'];
    $user->bairro = $novosdados['bairro'];
    $user->numero = $novosdados['numero'];
    $user->imagem = $novosdados['imagem'];
    $user->cidade = $novosdados['cidade'];
    $user->estado = $novosdados['estado'];
    $user->celular = $novosdados['celular'];
    $user->telefone = $novosdados['telefone'];
    $user->cep = $novosdados['cep'];

    $user->save();
    return redirect()->action('HomeController@perfil');
  }
}
