<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

        <!-- Styles -->
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

  </head>
  <body>
<h1>Produto</h1>
  <table id="produto">
    <thead>
      <tr>
        <th>Título</th>
        <th>Imagem</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $p)
      <tr>
        <th><h2>{{$p->titulo}}</h2></th>
        <th><img src="data:image/jpg;base64,{{$p->imagem}}" class="thumbnail" width="100px"/></th>
        <th>{{$p->descricao}}</th>
        <th>{{$p->preco}}</th>
        <!--categoria-->
        @foreach($categorias as $c)
          @if ($p->idCategoria == $c->id)
            <th>{{$c->nome}}</th>
          @endif
        @endforeach
      </tr>

      @endforeach
    </tbody>
  </table>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


<script>
$(document).ready(function(){
  $('#produto').DataTable(
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
