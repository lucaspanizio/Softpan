<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Transaction;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'due_date' => '20/08/2019',
            'type' => 'CP',
            'description' => 'CONTA DE LUZ',
            'original_value' => '150,00',
            'situation' => false,
            'entity_id' => '1',
            'user_id' => '1',
            'company_id' => '1',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Transaction CP registred');

        Transaction::create([
            'due_date' => '15/08/2019',
            'type' => 'CR',
            'description' => 'SERVIÇOS PRESTADOS',
            'original_value' => '1500,00',
            'current_value' => '1500,00',
            'situation' => true,
            'entity_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Transaction CR registred');
    }
}
