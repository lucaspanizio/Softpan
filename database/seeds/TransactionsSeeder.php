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
        $provider = Entity::find(5);
        $payment = FormOfPayment::find(1);

        $t1 = new Transaction([
            'due_date' => \Carbon\Carbon::yesterday(),
            'type' => 'CP',
            'description' => 'CONTA DE LUZ',
            'installments' => '1',
            'original_value' => '150.00',
            'current_value' => '150.00',
            'pay_off_date' =>  \Carbon\Carbon::now(),
            'situation' => '2'              
        ]);

        $t1->company()->associate($company);
        $t1->user()->associate($user);
        $t1->entity()->associate($provider);
        $t1->payment()->associate($payment);

        $t1->save();

        $user = User::find(2);
        $company = Company::find(2);
        $provider = Entity::find(6);
        $payment = FormOfPayment::find(2);

        $t3 = new Transaction([
            'due_date' => \Carbon\Carbon::tomorrow(),
            'type' => 'CP',
            'description' => 'CONTA TESTE',
            'installments' => '1',
            'original_value' => '150.00',
            'current_value' => '150.00',
            'pay_off_date' =>  \Carbon\Carbon::now(),
            'situation' => '1'              
        ]);

        $t3->company()->associate($company);
        $t3->user()->associate($user);
        $t3->entity()->associate($provider);
        $t3->payment()->associate($payment);
        $t3->save();




        /* Transação 2 - Contas a Receber */
        $user = User::find(2);
        $company = Company::find(2);
        $client = Entity::find(2);
        $payment = FormOfPayment::find(2);
        
        $t2 = new Transaction([
            'due_date' => \Carbon\Carbon::now(),
            'type' => 'CR',
            'installments' => '1',
            'description' => 'SERVIÇOS PRESTADOS',
            'original_value' => '1500.00',
            'current_value' => '1500.00',
            'situation' => '3'
        ]);
        
        $t2->company()->associate($company);
        $t2->user()->associate($user);
        $t2->entity()->associate($client);
        $t2->payment()->associate($payment);
        $t2->save();

        $user = User::find(1);
        $company = Company::find(1);
        $client = Entity::find(3);
        $payment = FormOfPayment::find(3);




        /* Transação 4 - Contas a Receber */
        $t4 = new Transaction([
            'due_date' => \Carbon\Carbon::tomorrow(),
            'type' => 'CR',
            'installments' => '1',
            'description' => 'SERVIÇOS TESTADOS',
            'original_value' => '1500.00',
            'current_value' => '1500.00',
            'situation' => '1'
        ]);
        
        $t4->company()->associate($company);
        $t4->user()->associate($user);
        $t4->entity()->associate($client);
        $t4->payment()->associate($payment);
        $t4->save();




        /* Transação 5 - Contas a Receber */
        $user = User::find(1);
        $company = Company::find(1);
        $client = Entity::find(4);
        $payment = FormOfPayment::find(1);

        $t5 = new Transaction([
            'due_date' => \Carbon\Carbon::tomorrow(),
            'type' => 'CR',
            'installments' => '1',
            'description' => 'SERVIÇOS NOVOS',
            'original_value' => '1500.00',
            'current_value' => '1500.00',
            'pay_off_date' => \Carbon\Carbon::yesterday(),
            'situation' => '2'
        ]);
        
        $t5->company()->associate($company);
        $t5->user()->associate($user);
        $t5->entity()->associate($client);
        $t5->payment()->associate($payment);

        $t5->save();
        
    }
}
