<?php

use Illuminate\Database\Seeder;
use App\Http\Models\FormOfPayment;

class FormOfPaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormOfPayment::create([
            'description' => 'BOLETO'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Form of Payment BOLETO created');

        FormOfPayment::create([
            'description' => 'CARTÃO'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Form of Payment CARTÃO created');

        FormOfPayment::create([
            'description' => 'CHEQUE'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Form of Payment CHEQUE created');

        FormOfPayment::create([
            'description' => 'DEPÓSITO'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Form of Payment DEPÓSITO created');

        FormOfPayment::create([
            'description' => 'DINHEIRO'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Form of Payment DINHEIRO created');
    }
}
