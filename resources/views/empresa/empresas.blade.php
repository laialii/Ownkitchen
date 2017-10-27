<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

        <!-- Styles -->
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

  </head>
  <body>
<h1>Empresas</h1>
  <table id="empresa">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Contato</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($empresas as $e)
      <tr>
        <th><h2>{{$e->nome}}</h2></th>
        <th><img src="data:image/jpg;base64,{{$e->imagem}}" class="thumbnail" width="100px"/></th>
        <th><p>Contato: {{$e->contato}}</p></th>
        <th><a href="/editarempresa/{{$e->id}}">Alterar</a></th>
        <th><a href="/deletarempresa/{{$e->id}}">Deletar</a></th>
      </tr>

      @endforeach
    </tbody>
  </table>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


<script>
$(document).ready(function(){
  $('#empresa').DataTable(
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
</body>
</html>
