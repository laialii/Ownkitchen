<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Produto;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
