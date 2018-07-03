@extends('.../layouts/template')
@section('conteudo')
<h1 class="page-header">Produto</h1>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTable no-footer" id="produto" aria-describedby="dataTables-example_info">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Imagem</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Descrição</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Preço</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Categoria</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
              </tr>
            </thead>
            <tbody>
            @if(Auth::check())
              @foreach($produtos as $p)
                @foreach($empresas as $e)
                @if($e->id == $p->idEmpresa && $e->idUsuario == Auth::user()->id)
              <tr class="gradeU odd">
                <td class=""><a href="{{action('ProdutoController@mostrar', $p->id)}}">{{$p->titulo}}</a></td>
                <input type="hidden" name="" value="{{$imagem = Storage::url('imagem/'.$p->imagem)}}">
                @if ($p->imagem !== NULL)
                <td class=""><a href="{{action('ProdutoController@mostrar', $p->id)}}"><img src="{{$imagem}}" class="thumbnail" width="50px"></a></td>
                @else
                <td class=""><a href="{{action('ProdutoController@mostrar', $p->id)}}"><img src="{{Storage::url('imagem/no-image.png')}}" class="thumbnail" width="50px"></a></td>
                @endif
                <td class="sorting_1">{{$p->descricao}}</td>
                <td class="center ">{{$p->preco}}</td>
                @foreach($categorias as $c)
                @if ($p->idCategoria == $c->id)
                <td>{{$c->nome}}</td>
                @endif
                @endforeach
                <td class="center">
                  <a href="{{action('ProdutoController@deletar', $p->id)}}">
                    <i class="glyphicon glyphicon-edit"></i>
                  </a>
                </td>
                <td class="center">
                  <a href="/deletarproduto/{{$p->id}}">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                </td>
              </tr>
              @endif
              @endforeach
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('datatable')
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
@endsection
