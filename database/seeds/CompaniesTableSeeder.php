<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'J PANIZIO TRANSPORTES',            
            'phone' => '(43) 3066-0255',            
            'cnpj' => '21.153.290/0001-83',            
            'street' => 'RUA AMELIA RISKALLAH ABIB TAUIL',
            'neighborhood' => 'PARQUE INDUSTRIAL',
            'zipcode' => '86030-290',
            'number' => '290',
            'city' => 'LONDRINA',
            'state' => 'PR',
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company J Panizio Transportes created');

        Company::create([
            'name' => 'C E PANIZIO TRANSPORTES',
            'phone' => '(43) 36050619',
            'cnpj' => '85.946.153/0001-94',           
            'street' => 'RUA INVENTADA',
            'neighborhood' => 'PARQUE JOAO MIGUEL',
            'zipcode' => '86030-817',
            'number' => '300',
            'city' => 'IBAITI',
            'state' => 'PR',
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company C E Panizio Transportes created');
    }
}
