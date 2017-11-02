<head>
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<div class="col-lg-12">
  <div class="col-md-6">
    <h1 class="page-header">{{$e->nome}}</h1>
    <table width="25%">
      <tr>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td><strong>Imagem</strong></td>
        <td>{{$e->imagem}}</td>
      </tr>
      <tr>
        <td><strong>Contato</strong></td>
        <td>{{$e->contato}}</td>
      </tr>
      <tr>
        <td><strong>Autor(a)</strong></td>
        <td>{{$u->name}}</td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <h3 class="page-header">Comentarios</h3>
    <table id="comentarios" width="25%">
    <tr>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <td>Nome:</td>
      <td>{{$u->name}}</td>
    </tr>
    <tr>
      <td>Comentário:</td>
      <td>{{$c->comentario}}</td>
    </tr>
    <tr>
      <td>Nota:</td>
      <td>{{$c->nota}}</td>
    </tr>
    <tr>
      <td><a href="{{action('ComentarioController@editar', $c->id)}}">Alterar</a></td>
      <td><a href="{{action('ComentarioController@deletar', $c->id)}}">Excluir</a></td>
    </tr>
    </table>
  </div>
  <div class="col-md-6">
    <h3 class="page-header">Comentar</h3>
    <form action="{{action('ComentarioController@comentarEmEmpresa', $e->id)}}" method="post">
      <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
      <input type="hidden" name="autorizar" value="0">
      <input type="hidden" name="idUsuario" value="{{$u->id}}">
      <input type="hidden" name="idTabela" value="{{$e->id}}">
      <input type="hidden" name="empresa" value="1">

      <div class="form-group">
        <textarea name="comentario" rows="8" cols="80" placeholder="Digite seu comentário...">
        </textarea>
        <br>
        <label>Nota</label>
        <br>
        <input type="number" name="nota" class="form-control pull-right">
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-success">Enviar</button>
      </div>
    </form>
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
