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
  <link rel="stylesheet" href="../assets/lib/bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/lib/iconic/font/css/open-iconic-bootstrap.css">

  <!-- Metis core stylesheet -->
  <link rel="stylesheet" href="../assets/css/main.css">

  <!-- metisMenu stylesheet -->
  <link rel="stylesheet" href="../assets/lib/metismenu/metisMenu.css">

  <!-- onoffcanvas stylesheet -->
  <link rel="stylesheet" href="../assets/lib/onoffcanvas/onoffcanvas.css">

  <!-- animate.css stylesheet -->
  <link rel="stylesheet" href="../assets/lib/animate.css/animate.css">
  <link rel="stylesheet/less" type="text/css" href="../assets/less/theme.less">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>


@yield('estilos')
</head>
<body class="boxed">
  <div class="bg-red dker" id="wrap">
    <div id="top" class="">
      <!-- .navbar -->
      <header class="head">
        <div class="search-bar">
          <form class="main-search" action="">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquisar...">
              <span class="input-group-btn">
                <button class="btn btn-primary btn-sm text-muted" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
          <!-- /.main-search -->
        </div>
        <!-- /.search-bar -->
        <div class="main-bar">

          <a href="/home" class="navbar-brand"><img src="../assets/img/logo.png" alt=""></a>

        </div>
        <!-- /.main-bar -->
      </header>
      <!-- /.head -->
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
          <div class="topnav">
            <div class="btn-group">
              <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
              class="btn btn-default btn-sm" id="toggleFullScreen">
              <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
            @if(!Auth::check())
            <div class="btn-group">
              <a href="{{ route('login') }}" data-toggle="tooltip" data-original-title="Entrar" data-placement="bottom"
              class="btn btn-default btn-sm">
                <i class="glyphicon glyphicon-log-in"></i>
              </a>
            </div>
            @else
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
            <li><a href="{{action('EmpresaController@criar')}}">Nova empresa</a></li>
            <li><a href="{{action('ProdutoController@criar')}}">Novo Produto</a></li>
            <li class='dropdown '>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Listagem <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{action('EmpresaController@index')}}">Empresas</a></li>
                <li><a href="{{action('ProdutoController@index')}}">Produtos</a></li>
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
<script src="../assets/lib/bootstrap/js/bootstrap.js"></script>
<!-- MetisMenu -->
<script src="../assets/lib/metismenu/metisMenu.js"></script>
<!-- Screenfull -->
<script src="../assets/lib/screenfull/screenfull.js"></script>
<!--jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>

@yield('datatable')
</body>

</html>
