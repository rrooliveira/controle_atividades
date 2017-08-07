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

//ROTA PARA A LISTAGEM DOS DADOS
Route::get('/', 'AtividadesController@listar');

//ROTA PARA A LISTAGEM DOS DADOS
Route::get('/listagem-filtrada/{status}/{situacao}', 'AtividadesController@listagemFiltrada');

//ROTA PARA O FORMULÁRIO DE CADASTRO DA ATIVIDADE
Route::get('/cadastrar', 'AtividadesController@cadastrar');

//ROTA PARA INSERIR OS DADOS DO FORMULÁRIO DE ATIVIDADE
Route::post('/cadastrar-atividade', 'AtividadesController@cadastrarAtividade');

//ROTA PARA EDITAR OS DADOS DA ATIVIDADE
Route::get('/editar/{id}', 'AtividadesController@editar');

//ROTA PARA EDITAR OS DADOS DA ATIVIDADE
Route::post('/editar-dados', 'AtividadesController@editarDados');