<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('due_date')->nullable(false);
            $table->date('pay_off_date')->nullable();
            $table->enum('type', ['CP', 'CR']); //CP - Contas a Pagar, CR - Contas a Receber
            $table->string('description');
            $table->string('situation');
            $table->string('original_value');
            $table->string('current_value');
            $table->boolean('situation')->default(true);   
            
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('company');

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
