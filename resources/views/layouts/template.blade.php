<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <!--IE Compatibility modes-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Mobile first-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ownkitchen</title>

  <meta name="description" content="Plataforma de venda e compra de comidas">
  <meta name="author" content="Laiali">
  <meta name="msapplication-TileColor" content="#5bc0de" />
  <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/lib/bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/lib/iconic/font/css/open-iconic-bootstrap.css">

  <!-- Metis core stylesheet -->
  <link rel="stylesheet" href="/assets/css/main.css">

  <!-- metisMenu stylesheet -->
  <link rel="stylesheet" href="/assets/lib/metismenu/metisMenu.css">

  <!-- onoffcanvas stylesheet -->
  <link rel="stylesheet" href="/assets/lib/onoffcanvas/onoffcanvas.css">

  <!-- animate.css stylesheet -->
  <link rel="stylesheet" href="/assets/lib/animate.css/animate.css">
  <link rel="stylesheet/less" type="text/css" href="/assets/less/theme.less">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>


@yield('estilos')
</head>
<body class="boxed">
  <div class="bg-red dker" id="wrap">
    <div id="top" class="">
      <!-- .navbar -->
      <header class="head">
        <div class="search-bar">
          <!--
          <form class="main-search" action="">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquisar...">
              <span class="input-group-btn">
                <button class="btn btn-primary btn-sm text-muted" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>-->
          <!-- /.main-search -->
        </div>
        <!-- /.search-bar -->
        <div class="main-bar">

          <a href="/home" class="navbar-brand"><img src="/assets/img/logo.png" alt=""></a>

        </div>
        <!-- /.main-bar -->
      </header>
      <!-- /.head -->
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
          <div class="topnav">
            <div class="btn-group">
            @if(!Auth::check())
            <div class="btn-group">
              <a href="{{ route('login') }}" data-toggle="tooltip" data-original-title="Entrar" data-placement="bottom"
              class="btn btn-default btn-sm">
                <i class="glyphicon glyphicon-log-in"></i>
              </a>
            </div>
            @else
            <div class="btn-group">
              <a href="{{action('HomeController@perfil')}}" class="btn btn-default btn-sm">
                  <i class="glyphicon glyphicon-user"></i>
              </a>
            </div>
            <div class="btn-group">
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                           data-toggle="tooltip" data-original-title="Sair" data-placement="bottom"
                           class="btn btn-default btn-sm">
                  <i class="glyphicon glyphicon-log-out"></i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
            @endif
          </div>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <!-- .nav -->
          <ul class="nav navbar-nav">
            <li><a href="{{action('ProdutoController@index')}}">Produtos</a></li>
            <li class='dropdown '>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Empresas <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{action('EmpresaController@criar')}}">Nova empresa</a></li>
                <li><a href="{{action('EmpresaController@index')}}">Empresas</a></li>
                @if(Auth::check())
                <li><a href="{{action('EmpresaController@empresasdousuario', Auth::id())}}">Suas empresas</a></li>
                @endif
              </ul>
            </li>
          </ul>
          <!-- /.nav -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- /.navbar -->

  </div>
  <div id="content">
    <div class="outer">
      <div class="inner bg-light lter">
          @yield('conteudo')
      </div>
      <!-- /.inner -->
    </div>
    <!-- /.outer -->
  </div>
  <!-- /#content -->

  <div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
    <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
    <br>
    <br>
  </div>
  <!-- /#right -->
</div>
<!-- /#wrap -->
<footer class="Footer bg-red dker">
  <p>2017 &copy; Feito por Laiali</p>
</footer>
<!-- /#footer -->
<!--Bootstrap -->
<script src="/assets/lib/bootstrap/js/bootstrap.js"></script>
<!-- MetisMenu -->
<script src="/assets/lib/metismenu/metisMenu.js"></script>
<!-- Screenfull -->
<script src="/assets/lib/screenfull/screenfull.js"></script>
<!--jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>

  <!--CEP API-->
  <script src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
jQuery(function($){
   $("input[name='cep']").change(function(){
      var cep_code = $(this).val();
      if( cep_code.length <= 0 ) return;
      $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
         function(result){
            if( result.status!=1 ){
               alert(result.message || "Houve um erro desconhecido");
               return;
            }
            var end = result.address;
            var end_array = end.split("-");
            var siglas = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
            var nomeestados = ['Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins',]
            var indice = siglas.indexOf(result.state);
            $("input[name='cep']").val( result.code );
            $("input[name='estado']").val( result.state );
            $("input[name='cidade']").val( result.city );
            $("input[name='bairro']").val( result.district );
            $("input[name='endereco']").val( end_array[0] );
            $("input[name='estado']").val( nomeestados[indice] );



         });
   });
});
</script>

@yield('datatable')
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
