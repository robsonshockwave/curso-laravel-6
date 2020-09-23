<?php

//AULA Factory

//por exemplo tá desenvolvendo uma aplicação e tem uma tabela de produtos, e vc quer ter  uma lista de produtos fake pra fazer seus testes, uma validação


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//se der erro aqui \/ coloque Models ali em use App\User; como tá lá
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345'), // password
        'remember_token' => Str::random(10),
    ];
});

//Vamos criar uma lista fake de usuário, vá lá em seeds
