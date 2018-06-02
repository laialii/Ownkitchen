@extends('.../layouts/template')
@section('conteudo')
<h1 class="page-header">Empresas</h1>
<div class="row">
  <div class="col-lg-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <div class="dataTables_wrapper form-inline" role="grid">
            <table class="table table-striped table-bordered table-hover dataTable no-footer display" id="empresa" earia-describedby="dataTables-example_info">
              <thead>
                <tr role="row"><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Nome</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Imagem</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Contato</th>
                  @if(Auth::check())
                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
                  <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($empresas as $e)
                <tr class="gradeU odd">
                  <td class=""><a href="{{action('EmpresaController@mostrar', $e->id)}}">{{$e->nome}}</a></td>
                  <input type="hidden" name="" value="{{$imagem = Storage::url('imagem/'.$e->imagem)}}">
                  @if ($e->imagem !== NULL)
                  <td class=""><a href="{{action('EmpresaController@mostrar', $e->id)}}"><img src="{{$imagem}}" class="thumbnail" width="50px"></a></td>
                  @else
                  <td class=""><a href="{{action('EmpresaController@mostrar', $e->id)}}"><img src="{{Storage::url('imagem/no-image.png')}}" class="thumbnail" width="50px"></a></td>
                  @endif
                  <td class="sorting_1">Contato: {{$e->contato}}</td>
                  @if(Auth::check())
                  <td class="center ">
                    @if ($e->idUsuario == Auth::user()->id)
                    <a href="{{action('EmpresaController@editar', $e->id)}}">
                      <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    @endif
                  </td>
                  @endif
                  @if(Auth::check())
                  <td class="center ">
                    @if ($e->idUsuario == Auth::user()->id)
                    <a href="{{action('EmpresaController@deletar', $e->id)}}">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>
                    @endif
                  </td>
                  @endif
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

@endsection

@section('datatable')
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
