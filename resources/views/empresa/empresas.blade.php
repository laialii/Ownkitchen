@extends('.../layouts/template')
@section('estilos')

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/lib/iconic/font/css/open-iconic-bootstrap.css">

  <!-- Metis core stylesheet -->
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- metisMenu stylesheet -->
  <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

  <!-- onoffcanvas stylesheet -->
  <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

  <!-- animate.css stylesheet -->
  <link rel="stylesheet" href="assets/lib/animate.css/animate.css">
  <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

@endsection

@section('conteudo')
<h1 class="page-header">Empresas</h1>
<div class="row">
  <div class="col-lg-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
      <div class="panel-heading">

      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="empresa" aria-describedby="dataTables-example_info">
              <thead>
                <tr role="row"><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 185px;" >Nome</th>

                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 242px;" aria-label="Browser: activate to sort column ascending">Imagem</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 222px;" aria-label="Platform(s): activate to sort column ascending" aria-sort="ascending">Contato</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 159px;" aria-label="Engine version: activate to sort column ascending"></th>
                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 114px;" aria-label="CSS grade: activate to sort column ascending"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($empresas as $e)
                <tr class="gradeU odd">
                  <td class="">{{$e->nome}}</td>
                  <td class=""><img src="data:image/jpg;base64,{{$e->imagem}}" class="thumbnail" width="100px"/></td>
                  <td class="sorting_1">Contato: {{$e->contato}}</td>
                  <td class="center "><a href="/editarempresa/{{$e->id}}">Alterar</a></td>
                  <td class="center "><a href="/deletarempresa/{{$e->id}}">Deletar</a></td>
                  <td class="center "><a href="/detalhesempresa/{{$e->id}}">Visualizar</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--End Advanced Tables -->
  </div>
</div>

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

@endsection
