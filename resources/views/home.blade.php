@extends('.../layouts/template')

@section('conteudo')
<div class="col-lg-6">
  <h1>Novas empresas</h1>
  @foreach($empresas as $e)
  <p><a href="{{action('EmpresaController@mostrar', $e->id)}}">{{$e->nome}}</a><br>
  @foreach($user as $us)
    @if ($e->idUsuario == $us->id)
      <small>{{$us->name}}</small></p>
    @endif
  @endforeach
  <hr>
  @endforeach
</div>
<div class="col-lg-6">
  <h1>Novos produtos</h1>
  @foreach($produtos as $p)
  <p><a href="{{action('ProdutoController@mostrar', $e->id)}}">{{$p->titulo}}</a><br>
  @foreach($todasempresas as $e)
    @if ($p->idEmpresa == $e->id)
      <small>{{$e->nome}}</small></p>
    @endif
  @endforeach
  <hr>
  @endforeach
</div>
@endsection
