@extends('.../layouts/template')

@section('conteudo')
<div class="col-lg-6">
  <h1>Novas empresas</h1>
  @if($empresas)
  @foreach($empresas as $e)
  <p><a href="{{action('EmpresaController@mostrar', $e->id)}}">{{$e->nome}}</a><br>
  @foreach($user as $us)
    @if ($e->idUsuario == $us->id)
      <small>{{$us->name}}</small></p>
    @endif
  @endforeach
  <hr>
  @endforeach
  @else
<p>Não há empresas cadastradas. <a href="{{action('EmpresaController@criar')}}">Clique aqui </a>para cadastrar a primeira.</p>
  @endif
</div>
<div class="col-lg-6">
  <h1>Novos produtos</h1>
  @if($produtos)
  @foreach($produtos as $p)
  <p><a href="{{action('ProdutoController@mostrar', $p->id)}}">{{$p->titulo}}</a><br>
  @foreach($todasempresas as $e)
    @if ($p->idEmpresa == $e->id)
      <small>{{$e->nome}}</small></p>
    @endif
  @endforeach
  <hr>
  @endforeach
  @else
<p>Não há produtos cadastrados. Cadastre uma empresa para cadastrar seus produtos <a href="{{action('EmpresaController@criar')}}">clicando aqui</a>.</p>
  @endif
</div>
@endsection
