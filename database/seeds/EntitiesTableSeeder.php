<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Entity;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entity::create([
            'name' => 'MAGNUS FORMEDIC',
            'type' => 'C',
            'cnpj' => '12111109876543',
            'zipcode' => '86030817',
            'email' => 'magnus@magnus.com',
            'street' => 'RUA JOSE PIROLA',
            'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'situation' => true,
            'phone' => '4333377488',
            'phone' => '4330660255',
            'phone' => '43998654203',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Magnus Formedic created');

        Entity::create([
            'name' => 'UNIFIOS',
            'cnpj' => '123456789101112',
            'zipcode' => '86030290',
            'type' => 'F',
            'email' => 'unifios@unifios.com',
            'street' => 'RUA ROMA',
            'neighborhood' => 'JARDIM ALEMANHA',
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
