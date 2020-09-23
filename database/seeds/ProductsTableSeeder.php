<?php
//AULA Desafio - Criar Factory de Produtos
use Illuminate\Database\Seeder;


//aqui tem q colocar o diretório do Product
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //AULA Desafio - Criar Factory de Produtos
        factory(Product::class, 100)->create();
    }
}

//como eu digitei o nome desse arquivo errado, foi preciso ir no terminal e digitar
//composer dump-autoload
//e depois roda o comando pra criar o seeder
//php artisan db:seed --class=ProductsTableSeeder
//vai criar os 100 registros com 100 nomes de produtos diferentes