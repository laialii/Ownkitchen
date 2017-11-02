
<div class="col-lg-6">
  <h1 class="page-header">Editar produto cadastrada</h1>
  <form action="/addproduto" method="post">
    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />

    <input type="hidden" name="idEmpresa" value="1" />

    <div class="form-group">
      <label>Titulo</label>
      <input name="titulo" class="form-control pull-right">
    </div>

    <div class="form-group">
      <label>Descrição</label>
      <textarea name="descricao" class="form-control pull-right">
      </textarea>
    </div>

    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem" class="form-control pull-right">
    </div>

    <div class="form-group">
      <label>Valor:</label>
      <input type="double" name="preco" class="form-control pull-right">
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
