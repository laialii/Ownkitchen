@extends('.../layouts/template')
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
