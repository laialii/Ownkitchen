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
  <h1 class="page-header">Criar empresa</h1>
  @if (count($errors) > 0)
    @component('alert')
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endcomponent
  @endif
  <form action="/addempresa" method="post">
    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />

    <input type="hidden"  name="idUsuario" value="1" />

    <div class="form-group">
      <label>Nome</label>
      <input name="nome" class="form-control pull-right" value="{{ old('nome') }}">
    </div>

    <div class="form-group">
      <label>Contato</label>
      <input name="contato" class="form-control pull-right" value="{{ old('contato') }}">
    </div>

    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem" class="form-control pull-right" value="{{ old('imagem') }}">
    </div>
    <br>
    <br>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    </div>
  </form>
</div>

@endsection
