@extends('.../layouts/template')

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
  <form action="/addempresa" method="post" enctype="multipart/form-data" >
    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden"  name="idUsuario" value="{{Auth::user()->id}}" />

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
      <input type="file" name="imagem" value="{{ old('imagem') }}">
    </div>
    <br>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</div>

@endsection
