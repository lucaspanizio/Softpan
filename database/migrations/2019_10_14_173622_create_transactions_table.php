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
            $table->string('installments')->nullable(false); //Quantidade de parcelas
            $table->enum('type', ['CP', 'CR']); //CP - Contas a Pagar, CR - Contas a Receber
            $table->string('description')->nullable(false);
            $table->string('original_value')->nullable(false);
            $table->string('interest_rate')->nullable(); //Juros
            $table->string('penalty')->nullable(); //Multa
            $table->string('rates')->nullable(true); //Taxas (TED, geração de boleto...)
            $table->string('current_value')->nullable();
            $table->enum('situation', ['1', '2', '3'])->default('1')->nullable(); //1 - A VENCER, 2 - PAGO, 3 - ATRASADO
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {

            $table->unsignedInteger('entity_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies'); 
            $table->foreign('payment_id')->references('id')->on('form_of_payments'); 
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
