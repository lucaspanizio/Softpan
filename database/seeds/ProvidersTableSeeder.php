<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name' => 'MAGNUS FORMEDIC',
            'cnpj' => '12111109876543',
            'email' => 'magnus@magnus.com',
            'street' => 'RUA JOSE PIROLA',
            // 'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'situation' => true,
            'phone' => '4333377488'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Magnus Formedic created');

        Provider::create([
            'name' => 'UNIFIOS',
            'cnpj' => '123456789101112',
            'email' => 'unifios@unifios.com',
            'street' => 'RUA ROMA',
            // 'neighborhood' => 'JARDIM ALEMANHA',
            'number' => '2800',
            'city' => 'JATAIZINHO',
            'state' => 'PR',
            'situation' => true,
            'phone' => '4333431890'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Unifios created');
    }
}
