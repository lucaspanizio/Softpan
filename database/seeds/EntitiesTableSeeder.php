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
            'cnpj' => '12.111.109/8765-43',
            'zipcode' => '86030-817',
            'email' => 'magnus@magnus.com',
            'street' => 'RUA JOSE PIROLA',
            'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'situation' => true,
            'phone1' => '(43) 3337-7488',
            'phone2' => '(43) 3066-0255',
            'cellphone' => '(43) 9 9865-4203',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Magnus Formedic created');

        Entity::create([
            'name' => 'OURO NEGRO',
            'type' => 'C',
            'cnpj' => '11.111.109/1235-42',
            'zipcode' => '86030-817',
            'email' => 'email@ouronegro.com',
            'street' => 'RUA JOSE PIROLA',
            'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'situation' => true,
            'phone1' => '(43) 3337-7488',
            'phone2' => '(43) 3066-0255',
            'cellphone' => '(43) 9 9865-4203',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Ouro Negro created');

        Entity::create([
            'name' => 'LAGUNA TRANSPORTES',
            'type' => 'C',
            'cnpj' => '86.111.389/1234-11',
            'zipcode' => '86030-817',
            'email' => 'email@laguna.com',
            'street' => 'RUA JOSE PIROLA',
            'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'ARAUCARIA',
            'state' => 'PR',
            'situation' => true,
            'phone1' => '(43) 3337-7488',
            'phone2' => '(43) 3066-0255',
            'cellphone' => '(43) 9 9865-4203',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Laguna Transportes created');

        Entity::create([
            'name' => 'RISSO TRANSPORTES',
            'type' => 'C',
            'cnpj' => '08.222.110/9876-34',
            'zipcode' => '86030-817',
            'email' => 'email@risso.com',
            'street' => 'RUA JOSE PIROLA',
            'neighborhood' => 'VILA ROMANA',
            'number' => '236',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'situation' => true,
            'phone1' => '(43) 3337-7488',
            'phone2' => '(43) 3066-0255',
            'cellphone' => '(43) 9 9865-4203',
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Risso Transportes created');

        Entity::create([
            'name' => 'UNIFIOS',
            'cnpj' => '13.453.258/0007-09',
            'zipcode' => '86030-290',
            'type' => 'F',
            'email' => 'unifios@unifios.com',
            'street' => 'RUA ROMA',
            'neighborhood' => 'JARDIM ALEMANHA',
            'number' => '2800',
            'city' => 'JATAIZINHO',
            'state' => 'PR',
            'situation' => true,
            'phone1' => '(43) 3343-1890'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Unifios created');

        Entity::create([
            'name' => 'LUCAS PANIZIO',
            'cpf' => '103.199.389-48',
            'zipcode' => '86030-290',
            'type' => 'F',
            'email' => 'lucaspanizio@gmail.com',
            'street' => 'RUA ROMA',
            'neighborhood' => 'JARDIM ALEMANHA',
            'number' => '2800',
            'city' => 'IBIPORA',
            'state' => 'PR',
            'situation' => true,
            'phone1' => '(43) 3343-1890'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Lucas Panizio created');

        Entity::create([
            'name' => 'UNIFIL',
            'cnpj' => '15.354.852/70000-90',
            'zipcode' => '86030-290',
            'type' => 'F',
            'email' => 'email@unifil.com',
            'street' => 'RUA ROMA',
            'neighborhood' => 'JARDIM ALEMANHA',
            'number' => '2800',
            'city' => 'LONDRINA',
            'state' => 'PR',
            'situation' => true,
            'phone1' => '(43) 3343-1890'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Unifil created');

        Entity::create([
            'name' => 'COPEL',
            'cnpj' => '31.159.951/0002-13',
            'zipcode' => '86030-290',
            'type' => 'F',
            'email' => 'email@copel.com',
            'street' => 'RUA ROMA',
            'neighborhood' => 'JARDIM ALEMANHA',
            'number' => '2800',
            'city' => 'LONDRINA',
            'state' => 'PR',
            'situation' => true,
            'phone1' => '(43) 3343-1890'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Provider Copel created');
    }
}
