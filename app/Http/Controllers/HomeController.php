<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Produto;
use App\User;

class HomeController extends Controller
{
  
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
}
