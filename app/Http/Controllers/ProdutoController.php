<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//AULA Listar/Paginar Registros
//tem q passar o diretório pra cá
use App\Models\Product;

//AULA Validações no Laravel 6 com Form Request
//tem que digitar o caminho aqui do request para a validação no store
use App\Http\Requests\StoreUpdateProductRequest;

class ProdutoController extends Controller
{

    //Controllers Resources

    //Injeção de Dependências

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Introdução a Views
        //pode passar variáveis para as views
        /*$teste = 123;
        $teste2 = 321;
        $teste3 = [1, 2, 3, 4, 5];*/
        //$products = ['TV', 'Geladeira', 'Forno', 'Sofá'];

        //AULA Listar/Paginar Registros
        $products = Product::latest()->paginate(); //pode pegar tbm no método get ao invés de all, pra fazer um where ou filtro
                            //paginate faz aparecer apenas os 15 primeiros por default
                            //latest()->paginate() faz pegar os 15 ultimos
        /*return view('teste', [
            'teste' => $teste
        ]); //precisa do Route? continua.. */

        //tem outro método, praticamente a mesma coisa que o de cima
        //return view('teste', compact('teste'));
    
        //Templates Blade                              \/ foi descontinuada do php, n usa mais
        //return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products')); //tá abrindo as pastas tudo até chegar no index
        
        //AULA Listar/Paginar Registros
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*
    public function store(Request $request) //Ele tá criando um objeto da classe Request e jogando o objeto/instância pra dentro de request
    {
        
    }
    */
    //Poderia fazer assim tbm, o resultado é o mesmo, porém o de cima é melhor/ mais enxuto
    /*public function store()
    {
        $request = new Request;
        // /\ isso é instância de Request
    }*/


    /*
    *protected $request;  //protegido, privado tanto faz
    *protected $user;
    *
    *public function __construct(Request $request, User $user)//injetou com a dependência de Request, mesma coisa que fazer $request = new Request;
    *{//aqui é dependência de request se fosse de outra classe, por exemplo User $user
    *    //para mostrar, irei fazer que é um instância de request
    *    dd($request->prm1); //continua.. vai ser util pra pegar dados que oq o usuário digitou no formulário e cadastrar no banco de dados
    *    $this->request = $request;
    *    //vantagem de fazer isso, é que não precisa ficar fazendo injeção de dependência em todos os métodos que for necessário usar request, só basta fazer $this->request
    *
    *    $this->user = $user;
    *} 
    */


    //Middlewares em Controllers
    public function __construct(Request $request)
    {
        $this->request = $request;

        //$this->middleware('auth');
        //se atualizar lá com /products irá redirencionar pra tela de login

        //$this->middleware('auth')->only('create');
        //aqui só vai precisar está autenticado/ na qual vai para tela de login, quando acessar products/create
    
        //poderia também, mais recomendado, passar um array e mostrar quais métodos devem aplicar esse middleware
        /*$this->middleware('auth')->only([
            'create', 'store'
            ]);*/

        //outra forma de aplicar o middleware seria
        /*$this->middleware('auth')->except([
            'index', 'show'
        ]);*/
        //esse métodos aplica autenticação em tudo, menos os que estão em ->except('qualquercoisa')
    } 

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //AULA  Listar Detalhes de um registro especifico
        //$product = Product::where('id', $id)->first();
        
        return view('admin.pages.products.show', [
            'product' = $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * Show the form for creating a new resource.
     *
     * //AULA Validações no Laravel 6 com Form Request 
     * Tem que colocar o parâmetro, ou seja, o caminho do request, novamenteeeeeeeeeeeeee
     * @param App\Http\Requests\StoreUpdateProductRequest
     * @return \Illuminate\Http\Response
     */
    //Aula Formulários (csrf)
    public function create()
    {
        return view('admin.pages.products.create');
    } //vai exibir o conteúdo de create.blade.php

    //public function store(Request $request)
    public function store(StoreUpdateProductRequest $request)//AULA Validações no Laravel 6 com Form Request, tem q digitar o caminho lá em cima da pasta onde tá o Request
    {   
        dd('Ok');
        //AULA Validações
        //antes de tudo tem que fazer a validação no cadastro, quantidade de caracteres, tipo de imagem etc...

        //comentei por cauda da //AULA Validações no Laravel 6 com Form Request
        /*$request->validate([
            'name'=>'required|min:3|max:50',//obrigatória, min 3 caracteres e max 50
            'description'=>'nullable|min:3|max:10000',//não obrigatória, min 3 caracteres e max 10000
            'photo'=>'required|image',//obrigatória, tem q ser imagem
        ]);*/

        //morre o processamento aqui
        //agora vai dentro de create.blade
        dd('OK');

        //dd('Cadastrando...'); //vai dar erro de csrf ao clicar em enviar
        //o erro dá para evitar ataques, caso haja milhões de cadastramento que resultará na derrubada do site
        //para isso, vá em create.blade.php e insira a csrf no form
    
        //AULA Pegar dados do formulário

        //dd($request->all()); //Mostra todos os dados dessa requisição, todos os parametros recebidos, oq o cliente digitou no FORMULARIO
        //dd($request->only(['name', 'description'])); //Pega apenas dados específicos
        //dd($request->name); //pega um valor do campo com esse nome lá em create.blade.php
        //dd($request->has('name')); //retorna se existe ou não o valor, utiliza raramente
        //dd($request->input('name', 'qualquercoisa')); //se tiver um nome retorna o nome e se tiver default retorna qualquercoisa que digitei ali
        //dd($request->except(['name', '_token'])); //pegas os valores, exeto o que colocou ali
    
        //AULA Upload de Arquivos
        //dd($request->file('photo')->isValid()); //vai mostrar as informções da foto dps q a enviou, como tamanho, data de envio, usado mt para validação depois 
        //->isValid verifica se o arquivo é válido ou não
        //outra maneira de fazer abaixo
        if($request->file('photo')->isValid()){
            //dd($request->photo;
            //dd($request->photo->extension()); //->extension mostra qual o formato do arquivo, jpg ou png etc
            //dd($request->photo->getClienteOriginalName()); //devolve o nome original do arquivo, não recomendado

            //COMO ARMAZENAR - vai armazenar as imagens dentro de storage/app
            //dd($request->file('photo')->store('products')); //vai criar uma pasta product onde ficará as fotos
            //esse dd é pra ver se deu certo ou n, mas n precisa dele pra enviar a foto
            
            //TBM TEM OUTRA FORMA, NA QUAL VC ESCOLHE O NOME QUE QUER DAR PARA O ARQUIVO
            //pega o nome que a pessoa deu e a extensão e gera o nome já customizado
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }
    }

    //Aula Formulários com Métodos de Envio
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Aula Formulários com Métodos de Envio 
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id')); //passa a variável id, que é do produto que está editando
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando o produto {id}");
    }
}
