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
            $table->date('due_date')->nullable(false); //Vencimento
            $table->date('pay_off_date')->nullable();  //Data recebimento/pagamento
            $table->enum('type', ['CP', 'CR']); //CP - Contas a Pagar, CR - Contas a Receber
            $table->string('description');
            $table->string('original_value');
            $table->string('current_value')->nullable();
            $table->enum('situation', ['1', '2', '3'])->default('1')->nullable(); //1 - A VENCER, 2 - PAGO, 3 - ATRASADO
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {

            $table->unsignedInteger('entity_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_id');

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
