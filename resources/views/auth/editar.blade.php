@extends('.../layouts/template')
@section('conteudo')
<div class="col-lg-6">
  <h1 class="page-header">Editar perfil</h1>
  <form action="{{action('HomeController@atualizar', $user->id)}}" method="post">
    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden"  name="id" value="{{$user->id}}" />

    <div class="form-group">
      <label>Nome</label>
      <input name="name" class="form-control pull-right" value="{{$user->name}}">
    </div>

    <div class="form-group">
      <label>E-mail</label>
      <input name="email" class="form-control pull-right" value="{{$user->email}}">
    </div>

    <div class="form-group">
      <label>Data de nascimento</label>
      <input name="nascimento" class="form-control pull-right" value="{{$user->nascimento}}">
    </div>
    <div class="form-group">
      <label>CPF</label>
      <input name="cpf" class="form-control pull-right" value="{{$user->nascimento}}">
    </div>
    <div class="form-group">
      <label>Celular</label>
      <input name="celular" class="form-control pull-right" value="{{$user->celular}}">
    </div>

    <div class="form-group">
      <label>Telefone</label>
      <input name="telefone" class="form-control pull-right" value="{{$user->telefone}}">
    </div>
    <div class="form-group">
      <label>CEP</label>
      <input name="cep" class="form-control pull-right" value="{{$user->cep}}">
    </div>
    <div class="form-group">
      <label>Rua</label>
      <input name="rua" class="form-control pull-right" value="{{$user->rua}}">
    </div>
    <div class="form-group">
      <label>Numero</label>
      <input name="numero" class="form-control pull-right" value="{{$user->numero}}">
    </div>
    <div class="form-group">
      <label>Bairro</label>
      <input name="bairro" class="form-control pull-right" value="{{$user->bairro}}">
    </div>
    <div class="form-group">
      <label>Cidade</label>
      <input name="cidade" class="form-control pull-right" value="{{$user->cidade}}">
    </div>
    <div class="form-group">
      <label>Estado</label>
      <input name="estado" class="form-control pull-right" value="{{$user->estado}}">
    </div>
    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem" class="form-control pull-right" value="{{$user->imagem}}">
    </div>
    <br>
    <br>
    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</div>

@endsection
