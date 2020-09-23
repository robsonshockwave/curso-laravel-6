<!--Aula Formulários (csrf)-->
<!--essa view chama-se create pois é o nome do método que vai exibir essa view-->

    <!--precisa extender o conteúdo(trazer)-->
@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')<!--section chamada title com o título em seguida, onde vai colocar o título--> 

@section('content')<!--section chamada content, onde vai colocar o conteúdo em si-->
    <h1>Cadastrar Novo Produto</h1>

    <!--AULA Validações-->
    @if ($errors->any())<!--relembrando, any é pra verificar se existe-->
        <!--Se não existir/houver erros, vai passar a mensagem para o cliente-->
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach <!--as mensagens são geradas automaticamente pela pasta long-->
        </ul>
    @endif

    <!--aqui vai ter o formulário-->
    <!--quando mandar cadastrar, tem que cair no método que vai fazer o cadastro do produto em si, que é o store, tem q definir a action justamente pra enviar pra rota que rendirecionar pra controller-->
<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"> <!-- << AULA Upload de Arquivos no Laravel - 1º passo: sem aquilo não consegue trabalhar com uploads de arquivos-->
        <!--input sem ser oculto
        <input type="text" name="_token" value="{ { csrf_token() }}"> -->
        <!--input oculto, só aquilo ali-->
        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}"><!--AULA Validações no Laravel 6 com Form Request, aqui esse value é pra permitir q no campo de preenchimento fique com oq a pessoa digitou após o erro-->
        <input type="text" name="description" placeholder="Descrição">
        <input type="file" name="photo"> <!-- << AULA Upload de Arquivos no Laravel - 2º passo: pra enviar a foto --- Essa request vai lá para o ProdutoController.php no método store-->
        <input type="submit"></button>
    </form>

    <!--agora vai lá no index.blade.php  um link chamado cadastrar pra enviar naquela rota de cadastrar-->
@endsection   