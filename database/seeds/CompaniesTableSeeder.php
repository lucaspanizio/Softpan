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
            // 'email' => 'matriz@paniziotransportes.com.br',
            'cnpj' => '21153290000183',            
            'street' => 'RUA AMELIA RISKALLAH ABIB TAUIL',
            // 'neighborhood' => 'PARQUE INDUSTRIAL',
            'number' => '290',
            'city' => 'LONDRINA',
            'state' => 'PR',
            'situation' => true,
            'phone' => '4330660255'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company J Panizio Transportes created');

        Company::create([
            'name' => 'C E PANIZIO TRANSPORTES',
            // 'email' => 'filial.ibaiti@paniziotransportes.com.br',
            'cnpj' => '8594615354894',           
            'street' => 'RUA INVENTADA',
            // 'neighborhood' => 'PARQUE JOAO MIGUEL',
            'number' => '300',
            'city' => 'IBAITI',
            'state' => 'PR',
            'situation' => true,
            'phone' => '4336050619'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Company C E Panizio Transportes created');
    }
}
