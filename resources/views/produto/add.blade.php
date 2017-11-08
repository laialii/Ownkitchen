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
  <h1 class="page-header">Cadastrar produto</h1>
  <form action="/addproduto" method="post">
    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />

    <input type="hidden" name="idEmpresa" value="1" />

    <div class="form-group">
      <label>Titulo</label>
      <input name="titulo" class="form-control pull-right" value="{{ old('titulo') }}">
    </div>

    <div class="form-group">
      <label>Descrição</label>
      <textarea name="descricao" class="form-control pull-right" value="{{ old('descricao') }}">
      </textarea>
    </div>

    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem" class="form-control pull-right" value="{{ old('imagem') }}">
    </div>

    <div class="form-group">
      <label>Valor:</label>
      <input type="double" name="preco" class="form-control pull-right" value="{{ old('preco') }}">
    </div>

    <div class="form-group">
      <label>Categoria:</label>
      <select name="idCategoria" class="form-control" required="">
        <option value="">Selecione...</option>
        @foreach ($categoria as $c)
          <option value="{{$c->id}}" value="{{ old('$c->id') }}">{{$c->nome}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <br>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block btn-success">Enviar</button>
    </div>
  </form>
</div>

@endsection
