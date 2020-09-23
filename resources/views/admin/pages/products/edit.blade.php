<!--Aula Formulários com Métodos de Envio-->
<!-- como q faz uma requisição com verbo http especifico, como put pra editar um produto -->

<!--copia o do create.blade.php-->
@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')<!--section chamada title com o título em seguida, onde vai colocar o título--> 

<!--vai para o método edit e update-->
@section('content')
    <h1>Editar produto {{ $id }}</h1>
                                <!--     \/ passa o id aqui, qualquercoisa, ou pode passar um array com vários valores como paramentro na rota, ou coloca o $id para que o cliente coloque o valor-->
<form action="{{ route('products.store', $id) }}" method="post"> <!--transforma post em put para não dar erro na hora de enviar o formulário-->
        <!--<input type="hidden" name="_method" value="PUT"> -->
        <!--existe uma maneira mais simples do que a de cima-->
        <!--@ method('PUT') ELE FALA PRA USAR DESSA FORMA, MAS MEU CÓDIGO SÓ ACEITA POST, ENTÃO IGNORA O PUT--> 
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <input type="submit"></button>
    </form>

@endsection

<!-- a url tá perfeita, mas o verbo http é post e por default só pode enviar dois tipos de verbo http, get ou post-->

