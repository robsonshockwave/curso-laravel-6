<?php

//AULA  Desafio - Criar Factory de Produtos
/* 
php artisan make:factory ProductFactory --model=Models\Product
para criar esse factory foi preciso digitar o código acima no terminal
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //AULA  Desafio - Criar Factory de Produtos
        'name' => $faker->unique()->word, //word vai gerar um valor
        'description' => $faker->sentence(),
        'price' => 12.2,

        /* agora digita isso no terminal pra criar um seeder
        php artisan make:seeder ProductTableSeeder
        */
    ];
});
