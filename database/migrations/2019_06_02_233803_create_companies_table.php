<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->string('zipcode')->nullable(true);                 
            $table->string('cnpj')->unique()->nullable(false);
            $table->boolean('situation')->default(true); 
            $table->string('phone')->nullable(true);
            $table->string('street')->nullable(true);
            $table->string('neighborhood')->nullable(true);
            $table->string('number')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            
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
        Schema::dropIfExists('companies');
    }
}
