@extends('.../layouts/template')

@section('conteudo')
<div class="col-lg-6">
  <h1 class="page-header">Cadastrar produto</h1>
  <form action="{{action('ProdutoController@armazenar')}}" method="post">
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

    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem" value="{{ old('imagem') }}">
    </div>
    <br>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</div>

@endsection
