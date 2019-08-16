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
            $table->string('zipcode');                 
            $table->string('cnpj')->unique();
            $table->boolean('situation')->default(true); 
            $table->string('phone');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('city');
            $table->string('state');
            
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
