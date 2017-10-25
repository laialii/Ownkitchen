<h1>Empresas</h1>

<div class="col-md-8 col-md-2">
@foreach($empresas as $e)
  <div class="col-md-4">
    <h2>{{$e->nome}}</h2>
    <img src="data:image/jpeg;base64,<?= $e->imagem ?>" alt="">
    <p>Contato: {{$e->contato}}</p>
  </div>
@endforeach
</div>
