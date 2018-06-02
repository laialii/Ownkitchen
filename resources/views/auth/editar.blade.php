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

@section('cep-api')
<script src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
jQuery(function($){
  $("input[name='cep']").change(function(){
    var cep_code = $(this).val();
    if( cep_code.length <= 0 ) return;
    $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
    function(result){
      if( result.status!=1 ){
        alert(result.message || "Houve um erro desconhecido");
        return;
      }
      var end = result.address;
      var end_array = end.split("-");
      var siglas = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
      var nomeestados = ['Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins',]
      var indice = siglas.indexOf(result.state);
      $("input[name='cep']").val( result.code );
      $("input[name='estado']").val( result.state );
      $("input[name='cidade']").val( result.city );
      $("input[name='bairro']").val( result.district );
      $("input[name='endereco']").val( end_array[0] );
      $("input[name='estado']").val( nomeestados[indice] );



    });
  });
});
</script>
@endsection
