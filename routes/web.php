<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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



Route::get('/', 'PrincipalController@principal')
    ->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

// definindo prefixo de rota e agrupando as rotas pertentes ao prefixo utilizado
Route::middleware('autenticacao')->prefix('/app')->group(function (){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/clientes', 'ClienteController@index')->name('app.clientes');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');


    Route::resource('produtos', 'ProdutoController');
});

//Recebendo parametro na rota e encaminhando para o controller
Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');




// Rota de contigência (fallback)
Route::fallback(function (){
    echo 'ERROR 404 - ROTA ACESSADA NÃO EXISTE. <a href="'.route('site.index').'"> Clique aqui </a> para voltar à pagina inicial';
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



