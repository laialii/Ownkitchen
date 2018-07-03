@extends('.../layouts/template')
@section('conteudo')
<div class="ui-sortable">
  <div class="box ui-sortable-handle">
    <header>
      <h4 class="page-header">{{$e->nome}}</h4>
      <div class="toolbar">
        @foreach($us as $users)
        @if($e->idUsuario == $users->id)
        <h4 class="page-header"><small>Por: {{$users->name}} </small> </h4>
        @endif
        @endforeach
      </div>
    </header>
    <div class="body">
      <table width="25%">
        <tr>
          <th></th>
        </tr>
        <tr>
          <td><img src='{{$a}}' width="100px"  class="thumbnail" /></td>
        </tr>
        <tr>
          <td><strong>Contato: </strong>{{$e->contato}}</td>
        </tr>
        @if(Auth::check())
        @if(Auth::user()->id == $e->idUsuario)
        <tr>
          <td><a href="{{action('EmpresaController@editar', $e->id)}}"> <i class="glyphicon glyphicon-edit"></i></a>
            <a href="{{action('EmpresaController@deletar', $e->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        @endif
        @endif
      </table>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!--------------------------- PRODUTOS --------------------------------------->
<div class="ui-sortable">
  <div class="box ui-sortable-handle">
    <header>
      <h4 class="page-header">Galeria de produtos</h4>
    </header>
    <div class="body">
      <!--  -->
      @if (count($p) > 0)
        @foreach($p as $produtos)
        <img src="{{Storage::url('imagem/'.$produtos->imagem)}}" class="thumbnail" width="100px">
        <a href="{{action('ProdutoController@mostrar', $produtos->id)}}">{{$produtos->titulo}} <i class="glyphicon glyphicon-search"></i></a>
          @if(Auth::check())
          @if(Auth::user()->id == $e->idUsuario)
          <a href="{{action('ProdutoController@editar', $produtos->id)}}"> <i class="glyphicon glyphicon-edit"></i></a></td>
          <a href="{{action('ProdutoController@deletar', $produtos->id)}}"> <i class="glyphicon glyphicon-trash"></i></a></td>
          @endif
          @endif
          <hr>
        @endforeach
        @if(Auth::check())
          @if(Auth::user()->id == $e->idUsuario)
            <a href="{{action('ProdutoController@criar', $e->id)}}" class="btn btn-metis-1 btn-line" data-original-title="" title="">Cadastre mais produtos!</a>
          @endif
        @endif
      @else
        @if(Auth::check())
          @if(Auth::user()->id == $e->idUsuario)
          <a href="{{action('ProdutoController@criar', $e->id)}}" class="btn btn-metis-1 btn-line" data-original-title="" title="">Cadastre seu primeiro produto!</a>
          @endif
        @endif
      @endif
    </div>
  </div>
</div>

<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!--------------------------- COMENTÁRIOS ------------------------------------->
<div class="ui-sortable">
    <div class="box ui-sortable-handle">
      <header>
        <h4 class="page-header">Comentários</h4>
        <div class="toolbar">
          <span class="label">label</span>
        </div>
      </header>
      <div class="body">
        @if (count($c) > 0)
        <table id="comentarios" width="25%">
          <tr>
            <th></th>
            <th></th>
          </tr>
          @foreach($c as $comentarios)
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
        <form action="{{action('ComentarioController@comentarEmEmpresa', $e->id)}}" method="post">
          <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="autorizar" value="0">
          <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}">
          <input type="hidden" name="idTabela" value="{{$e->id}}">
          <input type="hidden" name="empresa" value="1">

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
@endsection
