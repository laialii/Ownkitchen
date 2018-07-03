<?php

Route::get('/', function () {
    return view('paginainicial');
});

Route::get('home', 'HomeController@index');

Auth::routes();
Route::get('perfil', 'HomeController@perfil')->middleware('auth.basic');
Route::get('perfil/editar/{id}', 'HomeController@editar')->middleware('auth.basic')->where('id','[0-9]+');
Route::post('perfil/atualizar/{id}', 'HomeController@atualizar')->middleware('auth.basic')->where('id','[0-9]+');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('empresas', 'EmpresaController@index');
Route::get('empresas/{id}', 'EmpresaController@empresasdousuario')->where('id','[0-9]+');
Route::get('addempresa', 'EmpresaController@criar');
Route::post('addempresa', 'EmpresaController@armazenar');
Route::get('editarempresa/{id}', 'EmpresaController@editar');
Route::get('detalhesempresa/{id}', 'EmpresaController@mostrar')->where('id','[0-9]+');
Route::post('comentarEmEmpresa/{id}', 'ComentarioController@comentarEmEmpresa')->where('id','[0-9]+');
Route::post('atualizarempresa/{id}', 'EmpresaController@atualizar');
Route::get('deletarempresa/{id}', 'EmpresaController@deletar');

Route::get('produtos', 'ProdutoController@index');
Route::get('produtos/{id}', 'ProdutoController@produtosdousuario')->where('id','[0-9]+');
Route::get('addproduto/{id}', 'ProdutoController@criar')->where('id','[0-9]+');
Route::post('addproduto', 'ProdutoController@armazenar');
Route::get('editarproduto/{id}', 'ProdutoController@editar');
Route::get('detalhesproduto/{id}', 'ProdutoController@mostrar')->where('id','[0-9]+');
Route::post('comentarEmProduto/{id}', 'ComentarioController@comentarEmProduto')->where('id','[0-9]+');
Route::post('atualizarproduto/{id}', 'ProdutoController@atualizar');
Route::get('deletarproduto/{id}', 'ProdutoController@deletar');

Route::get('addcomentario', 'ComentarioController@criar');
Route::post('addcomentario', 'ComentarioController@armazenar');
Route::post('editarcomentario/{id}', 'ComentarioController@editar');
Route::get('deletarcomentario/{id}', 'ComentarioController@deletar');
Route::get('comentarios', 'ComentarioController@comentariosEmpresa');
