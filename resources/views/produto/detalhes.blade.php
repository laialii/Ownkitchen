@extends('.../layouts/template')
@section('conteudo')
<div class=".col-lg-12 ui-sortable">
  <div class="box ui-sortable-handle">
    <header>
      <h4 class="page-header">{{$p->titulo}}</h4>
      <div class="toolbar">
        <h4 class="page-header"><small>{{$e->nome}}</small> </h4>
      </div>
    </header>
    <div class="body">
      <div class=".col-md-6">
        <table width="25%">
          <tr>
            <th></th>
            <th></th>
          </tr>
          <tr>
            @if ($p->imagem !== NULL)
            <td><img src='{{$a}}' width="100px" class="thumbnail"/></td>
            @else
            <td class=""><img src="{{Storage::url('imagem/no-image.png')}}" class="thumbnail" width="50px"></td>
            @endif
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
            <td><a href="{{action('ProdutoController@editar', $p->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a href="{{action('ProdutoController@deletar', $p->id)}}"><i class="glyphicon glyphicon-trash"></i></a></td>
          </tr>
          @endif
          @endif
        </table>
      </div>
    </div>
  </div>
</div>
<div class=".col-lg-6 ui-sortable">
  <div class="box ui-sortable-handle">
    <header>
      <h4 class="page-header">Comentários</h4>
      <div class="toolbar">
        <span class="label">label</span>
      </div>
    </header>
    <div class="body">
      @if (count($comentario) > 0)
      <table id="comentarios" width="25%">
        <tr>
          <th></th>
          <th></th>
        </tr>
        @foreach($comentario as $comentarios)
        <tr>
          <td>Nome:</td>
          @foreach($us as $user)
          @if ($comentarios->idUsuario == $user->id)
          <td>{{$user->name}}</td>
          @endif
          @endforeach
        </tr>
        <tr>
          <td>Comentário:</td>
          <td>{{$comentarios->comentario}}</td>
        </tr>
        @if(Auth::check())
        @if(Auth::user()->id == $comentarios->idUsuario)
        <tr>
          <td><a href="{{action('ComentarioController@deletar', $comentarios->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        @endif
        @endif
      </table>
      @endforeach
      @else
      <p>Não há comentários</p>
      @endif
    </div>
    <div class="body">
      <h4>Comentar</h4>
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
          <input type="hidden" name="nota" value="0" class="form-control pull-right">
          <br>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
      @else
      <p>Faça o <a href="{{ route('login') }}">login</a> ou <a href="{{ route('register') }}">cadastre-se</a></p>
      @endif
    </div>
  </div>
</div>
</div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#comentarios').DataTable(
    {
      "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      }
    }

  );
});
</script>
<script src="{{asset('/js/like.js')}}"></script>
@endsection
