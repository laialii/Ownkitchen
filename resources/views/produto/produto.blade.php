@extends('.../layouts/template')
@section('conteudo')
<h1 class="page-header">Produto</h1>
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
                                        <tr role="row"><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 185px;" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 242px;">Imagem</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 222px;"aria-sort="ascending">Descrição</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 222px;"aria-sort="ascending">Preço</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 222px;"aria-sort="ascending">Categoria</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 159px;"></th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 114px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($produtos as $p)
                                      <tr class="gradeU odd">
                                        <td class="">{{$p->titulo}}</td>
                                        <td class=""><img src="data:image/jpg;base64,{{$p->imagem}}" class="thumbnail" width="100px"/></td>
                                        <td class="sorting_1">{{$p->descricao}}</td>
                                        <td class="center ">{{$p->preco}}</td>
                                        @foreach($categorias as $c)
                                          @if ($p->idCategoria == $c->id)
                                            <td>{{$c->nome}}</td>
                                          @endif
                                        @endforeach
                                        <td class="center "><a href="/editarproduto/{{$p->id}}">Alterar</a></td>
                                        <td class="center "><a href="/deletarproduto/{{$p->id}}">Deletar</a></td>
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
