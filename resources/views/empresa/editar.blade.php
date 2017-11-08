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
<div class="col-lg-6">
<h1 class="page-header">Editar empresa cadastrada</h1>
<form action="{{action('EmpresaController@atualizar', $e->id)}}" method="post">
  <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />

  <input type="hidden"  name="idUsuario" value="1" />
  <input type="hidden"  name="id" value="{{$e->id}}" />

  <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control pull-right">
  </div>

  <div class="form-group">
    <label>Contato</label>
    <input name="contato" class="form-control pull-right">
  </div>

  <div class="form-group">
    <label>Imagem</label>
    <input type="file" name="imagem" class="form-control pull-right">
  </div>
  <br>
<br>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-block btn-success">Enviar</button>
  </div>
  </form>
</div>

@endsection
