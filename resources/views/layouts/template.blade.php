<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OWNKITCHEN</title>
      <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <table>
      <tr>
        <th>Empresas</th>
        <th>Produtos</th>
        @if(!Auth::check())
        <th>Login</th>
        @else
        <th>Logout</th>
        @endif
      </tr>
    </table>
  </body>
</html>
