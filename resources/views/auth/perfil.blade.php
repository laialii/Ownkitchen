@extends('.../layouts/template')
@section('conteudo')
<h1 class="page-header">Perfil</h1>
<div class="body col-lg-12">
  <div class=".col-lg-3">
    <input type="hidden" name="" value="{{$imagem = Storage::url('imagem/'.$user->imagem)}}">
    @if ($user->imagem !== NULL)
    <td class=""><img src="{{$imagem}}" class="thumbnail" width="50px"></td>
    @else
    <td class=""><img src="{{Storage::url('imagem/no-image.png')}}" class="thumbnail" width="150px" height="200px"></td>
    @endif
  </div>
  <div class=".col-lg-9">
    <b>Nome: </b> {{$user->name}}<br>
    <b>E-mail: </b> {{$user->email}}<br>
    <b>Data de nascimento: </b> {{$user->nascimento}}<br>
    <b>CPF: </b> {{$user->cpf}}<br>
    <b>Endereço: </b> {{$user->rua}}, {{$user->numero}}, {{$user->bairro}}<br>
    <b>Cidade: </b> {{$user->cidade}}<br>
    <b>Estado: </b> {{$user->estado}}<br>
    <b>CEP: </b> {{$user->cep}}<br>
    <b>Telefone: </b> {{$user->telefone}}<br>
    <b>Celular: </b> {{$user->celular}}<br>

    <td><a href="{{action('HomeController@editar', $user->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td><br>
  </div>
</div>
@endsection
