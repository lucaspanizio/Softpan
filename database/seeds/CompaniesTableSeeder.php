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
            'phone' => '4330660255',            
            'cnpj' => '21153290000183',            
            'street' => 'RUA AMELIA RISKALLAH ABIB TAUIL',
            'neighborhood' => 'PARQUE INDUSTRIAL',
            'zipcode' => '86030290',
            'number' => '290',
            'city' => 'LONDRINA',
            'state' => 'PR',
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company J Panizio Transportes created');

        Company::create([
            'name' => 'C E PANIZIO TRANSPORTES',
            'phone' => '4336050619',
            'cnpj' => '8594615354894',           
            'street' => 'RUA INVENTADA',
            'neighborhood' => 'PARQUE JOAO MIGUEL',
            'zipcode' => '86030817',
            'number' => '300',
            'city' => 'IBAITI',
            'state' => 'PR',
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company C E Panizio Transportes created');
    }
}
