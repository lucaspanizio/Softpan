<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['C', 'F']);  // C - Cliente, F - Fornecedor
            $table->string('cpf')->unique()->nullable(true);
            $table->string('cnpj')->unique()->nullable(true);
           
            $table->string('street')->nullable(true);
            $table->string('zipcode')->nullable(true);                     
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('neighborhood')->nullable(true);
            $table->string('number')->nullable(true);

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable(true);
            $table->string('cellphone')->nullable(true);
            $table->boolean('situation')->default(true);   
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
