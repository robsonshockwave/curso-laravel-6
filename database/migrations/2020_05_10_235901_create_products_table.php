<?php
//AULA Introdução ao Eloquent ORM
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //AULA Introdução ao Eloquent ORM
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //inseri isso na aula de introdução
            $table->string('name')->unique();
            $table->text('description');
            $table->double('price', 10, 2);
            $table->string('image')->nullable();
            //dps vai no terminal e digita o comando pra criar a tabela
            //php artisan migrate
            //vai lá no site do mysql e vc verá q criou
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
