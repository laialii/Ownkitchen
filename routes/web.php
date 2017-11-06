<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('list', 'PictureController@showPictureList');
Route::get('pic/{id}', 'PictureController@showPicture');
Route::get('add', 'PictureController@addPicture');
Route::post('add', 'PictureController@savePicture');

Route::get('addempresa', 'EmpresaController@criar');
Route::post('addempresa', 'EmpresaController@armazenar');
Route::get('editarempresa/{id}', 'EmpresaController@editar');
Route::get('detalhesempresa/{id}', 'EmpresaController@mostrar')->where('id','[0-9]+');
Route::post('comentarEmEmpresa/{id}', 'ComentarioController@comentarEmEmpresa')->where('id','[0-9]+');
Route::post('atualizarempresa/{id}', 'EmpresaController@atualizar');
Route::get('deletarempresa/{id}', 'EmpresaController@deletar');

Route::get('addproduto', 'ProdutoController@criar');
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

Route::get('empresas', 'EmpresaController@index');
Route::get('produtos', 'ProdutoController@index');

Route::get('/comentarios', 'ComentarioController@comentariosEmpresa');

Route::get('/x', function () {
    return view('layouts/template');
});
