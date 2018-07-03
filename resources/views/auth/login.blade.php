<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!--IE Compatibility modes-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Mobile first-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Login</title>

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

</head>

<body class="login">

  <div class="form-signin">
    <div class="text-center">
      <img src="assets/img/logo.png" alt="Metis Logo">
    </div>
    <hr>
    <div class="tab-content">
      <div id="login" class="tab-pane active">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    <hr>
    <div class="text-center">
      <ul class="list-inline">
        <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
        <li><a class="text-muted" href="#forgot" data-toggle="tab">Esqueceu a senha?</a></li>
        <li><a class="text-muted" href="{{ route('register') }}">Cadastrar</a></li>
      </ul>
    </div>
  </div>


  <!--jQuery -->
  <script src="assets/lib/jquery/jquery.js"></script>

  <!--Bootstrap -->
  <script src="assets/lib/bootstrap/js/bootstrap.js"></script>

  <!--CEP API-->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/cep-api.js"></script>

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
