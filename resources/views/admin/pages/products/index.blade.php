    <!--Pode ter opções de menu, navegações etc 
    pode definir aqui, porém a desvantagem é que teria que repetir pra todas views que tivesse, gestão de produtos, financeira etc...
    pra isso que existe os templates
    para isso tudo ficará lá no app.blade.php-->

    @extends('admin.layouts.app')
    
    <!--
    @ section('title')
    Gestão de Produtos
    @ endsection

    Ao invés do de cima, pode fazer como o de baixo também
    -->

    @section('title', 'Gestão de produtos')<!--Fica o título lá na aba-->


    @section('content') <!--mostra onde vai substituir, e coloca esse esse-->
    <h1>Exibindo os Produtos</h1>
                    <!--Coloca o que quer exibir aqui-->
    
    <!--AULA Listar/Paginar Registros--                  usou isso \/ pra mudar o botão   -->
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>
    <hr> <!--ignora esse <a href até hr> não é da aula de Listar/Paginar é de outra-->



    <!--aqui está fazendo a listagem dos produtos em si, q pegou lá do controller-->
    
    <!--AULA Incluindo o Bootstrap no Laravel 6.x (via CDN)-->
    <table class="table table-striped"> <!--vai deixar o estilo da página com outra cara-->
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <!--AULA  Listar Detalhes de um registro especifico-->
                <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!--PRA COLOCAR PRA PULAR PÁGINA-->
    {!! $products->links() !!}
    
    @endsection
