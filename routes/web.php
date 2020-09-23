<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes :)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contato', function() {
    return 'Contato';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function() {
    return view('site.contact');
});

//Normalmente o verbo ::post é pra cadastrar algum registro
Route::post('/register', function() {
    return '';
}); //não vai entrar/acessar /\ ..continua

//Essa rota permite todo tipo de acesso HTTP
Route::any('/any', function(){
    return 'Any';
}); //tente evitar, pois ela aceita tudo, tenha cautela

//Pode especificar quais são os verbos hhtp que ela aceitará 
Route::match(['get', 'post'], '/match', function() {
    return 'Macth';
}); //com o get consigo acessar, só com o post ou put não tenho acesso ..continua 

//Rotas com parâmetros     \/------esse nome \/ não precisa ter o mesmo nome do parâmetro
Route::get('/categories/{flag}', function($teste) {
    return "Produtos da categoria: {$teste}";
});//basicamente, voce consegue acessar /categories/algumacoisa (algumacoisa será mostrado depois do Produtos da categoria: ) pode ser um outro nome também ao invés de algumacoisa

//                        \/------------esse nome \/ precisa estar condicente o primeiro apontado
Route::get('/categories/{flag}/posts', function($flag) {
    return "Posts da categoria: {$flag}";
});

//Aqui pode passar parâmetros opcionais/não obrigatórios - para que fique parado só no /produtos precisa usar o = '' ou 'qualquercoisa' porém neste retornará Produtos com qualquercoisa na frente
Route::get('/produtos/{idProduct?}/details', function($idProduct = '') { //pode ter prefixo depois do {idProduct?}
    return "Produto(s) {$idProduct}"; //<- aqui poderia pegar um valor, se for igual default exibe todos os produtos se tiver um valor pega o produto e faz a listagem só dele
});

//Como redirecionar rotas, de uma pra outra, quando tem um fluxo grande de acesso
// Route::get('redirect1', function() { //pode chamar um helper que são funções úteis no laravel, disponivel em toda parte do código
//     return redirect('/redirect2');
// });

//Pra deixar mais exuto o de cima, tem essa opção, nota que esse é ::redirect
Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function() {
    return 'redirect 02';
});

//Outra forma de retornar view direto
//Não é interessante retornar uma view, pois pode ser que tenha que passar alguma logica ou valor em si, interessante passar por um controler para conseguir rendirecionar, pegar informações e mandar pra view
//view simples pode passar diretamente pra rota, só trabalhe assim se ela for estática
/* Route::get('/view', function () {
    return view('welcome');
}); */
//Simplificando o de cima
Route::view('/view', 'welcome', ['id' => 'teste']); //pode passar um id também
//se tiver              /\ em outra pasta dentro de views coloque o .

Route::get('redirect3', function(){
    return redirect()->route('url.name');
});
//se um dia for necessário mudar o nome da rota url, teria que refatorar todo o código pra trocar o nome, mas com isso ->name('qualquercoisa') não precisaria
Route::get('/nome-url', function(){
    return 'Hey hey hey';
})->name('url.name');

//quando for trabalhar com view, em muito momento em vez de passar a url/nomedaurl com o código de cima é só passar simplesmente como a de baixo
//route('url.name');


//Grupo de Rotas

Route::get('/login', function() {
    return 'Login';
})->name('login');

//Um dos grupos de rotas ::middleware, a desvantagem dele é que pra mudar o /admin/ teria que renomear todas as rotas, seus prefixos
Route::middleware([])->group(function() {//pode passar uma string ou um array com vários middleware
//                   /\ sem esse ele permite o acesso

/* Route::get('/admin/dashboard', function() {
    return 'Home Admin';
}); Ficaria assim dentro do ::middleware*/

//Outro grupo de rotas seria o :: prefix
    Route::prefix('admin')->group(function(){//diz esse ser necessário
        //se quiser /\ mudar o prefixo, só renomear ali
        //Aqui não precisa do /admin/ como visto no ::middleware

        //Rota barra para ir na tela inicial do admin sem ter outro /qualquercoisa depois
        /* Route::get('/', function() {
            return 'Admin'; //aqui poderia redirencionar pro dashboard
        });//middleware('auth'); */

        //Route::get('/dashboard', 'Admin\TesteController@teste'); //como está na pasta Admin o Controller precisa colocar o Admin\

        //Outro grupo de rotas seria o ::namescpace
        //Aqui não precisa mais do Admin\
        Route::namespace('Admin')->group(function(){
            //aqui pode definir um nome para as rotas
            //Utilizando o Controller-----------------\/
            //Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard'); //pra acessar precisa estar autenticado
            //vai dar erro pq a rota de login não está definida, por isso é preciso definir como fiz lá em cime

            //Ainda existe outro grupo de rotas
            //nesse fará que não precise colocar admin. no name, diferente do de cima
            Route::name('admin.')->group(function(){

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                
                //Precisou passar rota por rota, pode passar array ou uma string
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtos');
                
                //pode redirecionar pra outra host tbm
                Route::get('/', function(){
                    return redirect()->route('dashboard');
                })->name('home'); 

            });
        });
        
        //Pra usar precisa estar autenticado
    });
}); 

/*
//Pra não ficar estranho igual aí em cima, faço
//póde passar um array com vários tipos de rota quer
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namescpace' => 'Admin',
    //nome não funciona, exemplo 'name' => 'admin.'
], function(){
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', function(){
        return redirect()->route('dashboard');
    })->name('home'); 
}); 
*/

/* 
::put
::pack registrar parcialmente
::delete deletar um registro
::options
*/ 

//Aula de Controllers
Route::get('/products', 'ProductController@index')->name('products.index');

//Controllers com Parâmetros de Rotas
//Se quiser ver um produto específico, através do id
//Route::get('/products/{id}', 'ProductController@show')->name('products.show');
//vai pegar o valor da url pra colocar no id basicamente

/*
// Controllers de CRUD
//Cadastro de produto
Route::get('products/create', 'ProductController@create')->name('products.create');

//Criando rota para que acesse a partir do id do produto
Route::get('products/{id}/edit', 'ProductController@edit')->name('product.edit');
//nota-se que precisa colocar o products/qualquercoisa/edit

//Criando um que faz o cadastro em si
Route::post('products', 'ProductController@store')->name('product.store');
//Cadastro ou Registro, sempre use o post
//Não faz mal a URL ser a mesma desde o verbo seja difrente get != post

//Criando um que faz a edição do produto específico
Route::put('products/{id}', 'ProductController@update')->name('products.update');
//Modificando um produto usa ::put, se for parcialmente usa ::path

//Criando uma rota que vai deletar o produto em si
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
//Deletando um produto usa-se ::delete

///\/\/\/\/\/\/\/\ SÃO ROTAS PARA FAZER O CRUD /\/\/\/\/\/\/\/\/\
*/

//Controllers Resources
//Pode fazer o CRUD de outra forma, ou seja, não precisa ser esse acima, esse embaixo tbm funciona
/* Route::resource('products', 'ProdutoController'); //Só isso substitui o CRUD criado acima */
//Esse faz criar um controller já com tudo pronto, ao invés de fazer um, como feito no CRUD
//para isso basta digitar no terminal:
//php artisan make:controller ProdutoController --resource

//Middlewares em Controllers
//São filtros, por exemplo, os autentificação, que garante que somente usuários autentificados use os recursos do sistema
//Route::resource('products', 'ProdutoController')->middleware('auth');
//pra usar precisa estar autentificado, vai levar pra tela de loggin

//outro métodos de trabalhar com middleware é através do controler, vai lá em ProdutoController.php
Route::resource('products', 'ProdutoController');
