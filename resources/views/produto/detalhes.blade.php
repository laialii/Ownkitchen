@extends('.../layouts/template')

@section('conteudo')
<div class="col-lg-12">
  <div class="col-md-6">
    <h1 class="page-header">{{$p->nome}}</h1>
    <table width="25%">
      <tr>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td><strong>Imagem:</strong></td>
        <td>{{$p->imagem}}</td>
      </tr>
      <tr>
        <td><strong>Titulo</strong></td>
        <td>{{$p->titulo}}</td>
      </tr>
      <tr>
        <td><strong>Descrição</strong></td>
        <td>{{$p->descricao}}</td>
      </tr>
      <tr>
        <td><strong>Preço</strong></td>
        <td>{{$p->preco}}</td>
      </tr>
      <tr>
        <td><strong>Empresa</strong></td>
        <td>{{$e->nome}}</td>
      </tr>
      <tr>
        <td><strong>Categoria</strong></td>
        @foreach($c as $categorias)
        @if ($p->idCategoria == $categorias->id)
        <td>{{$categorias->nome}}</td>
        @endif
        @endforeach
      </tr>
      @if(Auth::check())
      @if(Auth::user()->id == $e->idUsuario)
      <tr>
        <td><a href="{{action('ProdutoController@editar', $p->id)}}">Alterar</a></td>
        <td><a href="{{action('ProdutoController@deletar', $p->id)}}">Excluir</a></td>
      </tr>
      @endif
      @endif
    </table>
  </div>
  <div class="col-md-6">
    <h3 class="page-header">Comentarios</h3>
    @if (count($comentario) > 0)
    <table id="comentarios" width="25%">
      <tr>
        <th></th>
        <th></th>
      </tr>
      @foreach($comentario as $comentarios)
      <tr>
        <td>Nome:</td>
        @foreach($u as $user)
        @if ($comentarios->idUsuario == $user->id)
        <td>{{$user->name}}</td>
        @endif
        @endforeach
      </tr>
      <tr>
        <td>Comentário:</td>
        <td>{{$comentarios->comentario}}</td>
      </tr>
      <tr>
        <td>Nota:</td>
        <td>{{$comentarios->nota}}</td>
      </tr>
      @if(Auth::check())
      @if(Auth::user()->id == $comentarios->idUsuario)
      <tr>
        <td><a href="{{action('ComentarioController@editar', $comentarios->id)}}">Alterar</a></td>
        <td><a href="{{action('ComentarioController@deletar', $comentarios->id)}}">Excluir</a></td>
      </tr>
      @endif
      @endif
    </table>
    @endforeach
    @else
    <p>Não há comentários</p>
    @endif
  </div>
  <div class="col-md-6">
    <h3 class="page-header">Comentar</h3>
    @if(Auth::check())
    <form action="{{action('ComentarioController@comentarEmProduto', $p->id)}}" method="post">
      <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
      <input type="hidden" name="autorizar" value="0">
      <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}">
      <input type="hidden" name="idTabela" value="{{$p->id}}">
      <input type="hidden" name="empresa" value="0">

      <div class="form-group">
        <textarea name="comentario" rows="3" cols="60" placeholder="Digite seu comentário...">
        </textarea>
        <br>
        <label>Nota</label>
        <br>
        <input type="number" name="nota" class="form-control pull-right">
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-success">Enviar</button>
      </div>
    </form>
    @else
    <p>Faça o <a href="{{ route('login') }}">login</a> ou <a href="{{ route('register') }}">cadastre-se</a></p>
    @endif
  </div>
</div>
@endsection
