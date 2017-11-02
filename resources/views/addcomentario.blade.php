<h1>Usuário comentando na Empresa(5)</h1>
<form action="/addcomentario" method="post">
  <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
  <input type="hidden" name="autorizar" value="0">
  <input type="hidden" name="idUsuario" value="{{$usuario->id}}">
  <input type="hidden" name="idTabela" value="{{$empresa->id}}">
  <input type="hidden" name="empresa" value="1">

  <div class="form-group">
    <label>Comente</label>
    <textarea name="comentario" rows="8" cols="80">

    </textarea>
  </div>

  <div class="form-group">
    <label>Nota</label>
    <input type="number" name="nota" class="form-control pull-right">
  </div>


    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block btn-success">Enviar</button>
    </div>

</form>
