<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//nome no singular, sempre começando com a letra maiúscula e com prefixo Controller
class ProductController extends Controller
{
    //Método que listaria todos produtos disponíveis
    //O controller deve ser bem enxuto, ele vai rendirecionar para outro recurso
    public function index() //quando for fazer a listagem de produtos ou algo, procure utilizar o index
    {   
        $products = ['Product 01', 'Product 02', 'Product 03']; 
        
        return $products; //retorna como json, acha q tá trabalhando com API
    }

    //normalmente quando vai procurar por id, coloca show
    //public function show($id)//como tá recebendo o id lá na rota daí aqui precisa ter o $id 
    //{//caso for pra deixar /\ somente na pagina products deixa ali como $id = default e lá na rota o ? dps do id
    //    return "Exibindo o produto de id: {$id}";
    //}

    //CONTROLLERS PARA FAZER O CRUD ABAIXO \/\/\/\/\/
    public function create()
    {
        return "Exibindo o form de cadastro de um novo produto";
    }

    public function edit($id)
    {
        return "Form para editar o produto: {$id}";
    }

    public function store()
    {
        return "Cadastrando um novo produto";
    }

    public function update($id)
    {
        return "Editando o produto: {$id}";
    }

    public function destroy($id)
    {
        return "Excluindo o produto: {$id}";
    }
    //CONTROLLERS PARA FAZER O CRUD ACIMA /\/\/\/\/\

    //Controllers Resources
    //Está no ProdutoController.php






}


