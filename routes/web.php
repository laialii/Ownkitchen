<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('addproduto', 'ProdutoController@criar');
Route::post('addproduto', 'ProdutoController@armazenar');

Route::get('addcomentario', 'ComentarioController@criar');
Route::post('addcomentario', 'ComentarioController@armazenar');

Route::get('empresas', 'EmpresaController@index');
Route::get('produtos', 'ProdutoController@index');

Route::get('/maps', function () {
    return view('index');
});
