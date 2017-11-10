@extends('.../layouts/template')

@section('conteudo')
<div class="col-lg-6">
<h1 class="page-header">Editar produto cadastrado</h1>
<form action="{{action('ProdutoController@atualizar', $produto->id)}}" method="post">
  <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />

  <input type="hidden"  name="idUsuario" value="1" />
  <input type="hidden"  name="id" value="{{$produto->id}}" />

  <div class="form-group">
    <label>Titulo</label>
    <input name="titulo" class="form-control pull-right" value="{{$produto->titulo}}">
  </div>

  <div class="form-group">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control pull-right" value="{{$produto->descricao}}">
    </textarea>
  </div>

  <div class="form-group">
    <label>Imagem</label>
    <input type="file" name="imagem" class="form-control pull-right">
  </div>

  <div class="form-group">
    <label>Valor:</label>
    <input type="double" name="preco" class="form-control pull-right" value="{{$produto->valor}}">
  </div>

  <div class="form-group">
    <label>Categoria:</label>
    <select name="idCategoria" class="form-control" required="">
      <option value="">Selecione...</option>
      @foreach ($categoria as $c)
        <option value="{{$c->id}}">{{$c->nome}}</option>
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
