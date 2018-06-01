@extends('.../layouts/template')
@section('conteudo')
<h1 class="page-header">Produto</h1>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTable no-footer" id="empresa" aria-describedby="dataTables-example_info">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Imagem</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Descrição</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Preço</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1">Categoria</th>
                @if(Auth::check())
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"></th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($produtos as $p)
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
                @if(Auth::check())
                <td class="center">
                  @foreach($empresas as $e)
                  @if($e->id == $p->idEmpresa && $e->idUsuario == Auth::user()->id)
                  <a href="{{action('ProdutoController@deletar', $p->id)}}">
                    <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  @endif
                  @endforeach
                </td>
                <td class="center">
                  @foreach($empresas as $e)
                  @if($e->id == $p->idEmpresa && $e->idUsuario == Auth::user()->id)
                  <a href="/deletarproduto/{{$p->id}}">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                  @endif
                  @endforeach
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
