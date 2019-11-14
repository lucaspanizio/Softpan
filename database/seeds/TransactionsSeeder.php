<?php

use App\Http\Models\Company;
use App\Http\Models\Entity;
use App\Http\Models\FormOfPayment;
use Illuminate\Database\Seeder;
use App\Http\Models\Transaction;
use App\Http\Models\User;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $company = Company::find(1);
        $entity = Entity::find(1);
        $payment = FormOfPayment::find(1);

        $t1 = new Transaction([
            'due_date' => \Carbon\Carbon::yesterday(),
            'type' => 'CP',
            'description' => 'CONTA DE LUZ',
            'installments' => '1',
            'original_value' => '150.00',
            'situation' => '2'              
        ]);

        $t1->company()->associate($company);
        $t1->user()->associate($user);
        $t1->entity()->associate($entity);
        $t1->payment()->associate($payment);

        $t1->save();

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Transaction CP registred');

        $t2 = new Transaction([
            'due_date' => \Carbon\Carbon::now(),
            'type' => 'CR',
            'installments' => '1',
            'description' => 'SERVIÇOS PRESTADOS',
            'original_value' => '1500.00',
            'current_value' => '1500.00',
            'situation' => '1'
        ]);

        $t2->company()->associate($company);
        $t2->user()->associate($user);
        $t2->entity()->associate($entity);
        $t2->payment()->associate($payment);

        $t2->save();

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Transaction CR registred');
    }
}
