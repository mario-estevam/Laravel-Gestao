<?php

use Illuminate\Support\Facades\Route;

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

// ->name define um nome pra rota, podendo ser usado para chama-la


Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', 'ContatoController@contato')->name('site.login');

// definindo prefixo de rota e agrupando as rotas pertentes ao prefixo utilizado
Route::prefix('/app')->group(function (){
    Route::get('/clientes', function (){return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', 'ContatoController@contato')->name('app.fornecedores');
    Route::get('/produtos', 'ContatoController@contato')->name('app.produtos');
});



Route::get('/rota1', function (){
    echo 'rota 1';
})->name('site.rota1');

// testando redirecionamento
// metodo 1:
Route::get('/rota2', function (){
    return redirect()->route('site.rota1');
})->name('site.rota2');

// metodo 2:
// Route::redirect('/rota2'), '/rota1');

/*

   Estabelecer expressões regulares para os parametros, verificando se os
   parametros passados coicidem com o que deve ser recebido

    Route::get(
        '/contato/{nome}/{categoria_id}',
        function(
           string $nome = 'Desconhecido',
           int $categoria_id = 1
        ) {
        echo "Estamos aqui: $nome - $categoria_id";
        }
)->where('categoria_id', '[0-9]+')->where('nome','[A-Za-z]+);


 */



