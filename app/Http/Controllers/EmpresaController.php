<?php

namespace App\Http\Controllers;

use Request;
use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    public function index()
    {
      $empresas = Empresa::all();
      return view('empresa/empresas')->with('empresas', $empresas);
    }

    public function criar()
    {
        return view('empresa/addempresa');
    }

    public function armazenar(Request $request)
    {
        Empresa::create(Request::all());
        return redirect()->action('EmpresaController@index');
    }

    public function mostrar($id)
    {
        //
    }

    public function editar($id)
    {
      $empresa = Empresa::find($id);
      return view('empresa/editarempresa', ['e'=>$empresa]);
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
}
