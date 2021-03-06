<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!--IE Compatibility modes-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Mobile first-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Cadastrar</title>

  <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
  <meta name="author" content="">

  <meta name="msapplication-TileColor" content="#5bc0de" />
  <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">

  <!-- Metis core stylesheet -->
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- metisMenu stylesheet -->
  <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

  <!-- onoffcanvas stylesheet -->
  <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

  <!-- animate.css stylesheet -->
  <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="login">

  <div class="form-signup">
    <div class="text-center">
      <img src="assets/img/logo.png" alt="Metis Logo">
    </div>
    <hr>
    <div class="tab-content">
      <div id="signup" class="tab-pane active col-lg-12">
        <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}

          <p class="text-muted text-center">
            Faça seu cadastro preenchendo os dados abaixo
          </p>
          <div class="col-lg-6">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input id="name" type="text" class="form-control top" name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus>

              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repita sua senha" required>

            </div>

            <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
              <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}" placeholder="Data de nascimento aaaa/mm/dd" required autofocus>

              @if ($errors->has('nascimento'))
              <span class="help-block">
                <strong>{{ $errors->first('nascimento') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
              <input type="number" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" required autofocus>

              @if ($errors->has('cpf'))
              <span class="help-block">
                <strong>{{ $errors->first('cpf') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" required autofocus>

              @if ($errors->has('telefone'))
              <span class="help-block">
                <strong>{{ $errors->first('telefone') }}</strong>
              </span>
              @endif
            </div>


            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="celular" value="{{ old('celular') }}" placeholder="Celular" required autofocus>

              @if ($errors->has('celular'))
              <span class="help-block">
                <strong>{{ $errors->first('celular') }}</strong>
              </span>
              @endif
            </div>

          </div>
          <div class="col-lg-6">
            <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" placeholder="CEP" required autofocus>

              @if ($errors->has('cep'))
              <span class="help-block">
                <strong>{{ $errors->first('cep') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('rua') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="rua" value="{{ old('rua') }}" placeholder="Rua" required autofocus>

              @if ($errors->has('rua'))
              <span class="help-block">
                <strong>{{ $errors->first('rua') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
              <input type="number" class="form-control" name="numero" value="{{ old('numero') }}" placeholder="Numero" required autofocus>

              @if ($errors->has('numero'))
              <span class="help-block">
                <strong>{{ $errors->first('numero') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" placeholder="Bairro" required autofocus>

              @if ($errors->has('bairro'))
              <span class="help-block">
                <strong>{{ $errors->first('bairro') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" placeholder="Cidade" required autofocus>

              @if ($errors->has('cidade'))
              <span class="help-block">
                <strong>{{ $errors->first('cidade') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <input type="text" class="form-control" name="estado" value="{{ old('estado') }}" placeholder="Estado" required autofocus>

              @if ($errors->has('estado'))
              <span class="help-block">
                <strong>{{ $errors->first('estado') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Imagem</label>

              <input type="file" name="imagem" class="form-control pull-right">
            </div>

            <div class="form-group">

              <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>

            </div>
          </div>
        </form>
      </div>
      <div id="login" class="tab-pane">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          <p class="text-muted text-center">
            Entre com seu e-mail e senha
          </p>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <input id="email" type="email" class="form-control top" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">

            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input id="password" type="password" class="form-control" name="password" required  placeholder="Senha">

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>


          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
      </div>
      <div id="forgot" class="tab-pane">
        <form action="{{ route('password.request') }}">
          {{ csrf_field() }}
          <p class="text-muted text-center">Digite um e-mail válido</p>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <br>
          <button class="btn btn-lg btn-danger btn-block" type="submit">Recuperar senha</button>
        </form>
      </div>
    </div>
    <hr>
    <div class="text-center">
      <ul class="list-inline">
        <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
        <li><a class="text-muted" href="#forgot" data-toggle="tab">Esqueceu a senha?</a></li>
        <li><a class="text-muted" href="#signup" data-toggle="tab">Cadastrar</a></li>
      </ul>
    </div>
  </div>


  <!--jQuery -->
  <script src="assets/lib/jquery/jquery.js"></script>

  <!--Bootstrap -->
  <script src="assets/lib/bootstrap/js/bootstrap.js"></script>

  <!--CEP API-->
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

<script type="text/javascript">
(function($) {
  $(document).ready(function() {
    $('.list-inline li > a').click(function() {
      var activeForm = $(this).attr('href') + ' > form';
      //console.log(activeForm);
      $(activeForm).addClass('animated fadeIn');
      //set timer to 1 seconds, after that, unload the animate animation
      setTimeout(function() {
        $(activeForm).removeClass('animated fadeIn');
      }, 1000);
    });
  });
})(jQuery);
</script>
</body>

</html>
