<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'LAGUNA TRANSPORTES',
            'cnpj' => '02526894000789',
            'email' => 'laguna@lagunatransportes.com',
            'street' => 'RUA ITALIA',
            // 'neighborhood' => 'JARDIM PRESIDENTE',
            'number' => '289',
            'city' => 'CURITIBA',
            'state' => 'PR',
            'situation' => true,
            'phone' => '4133568291'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Laguna Transportes created');

        Client::create([
            'name' => 'OURO NEGRO TRANSPORTES',
            'cnpj' => '05356894000921',
            'email' => 'ouronegro@ouronegrotransportes.com',
            'street' => 'RUA ROMA',
            // 'neighborhood' => 'JARDIM PREFEITO',
            'number' => '290',
            'city' => 'CAMBE',
            'state' => 'PR',
            'situation' => true,
            'phone' => '4540028922'
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Client Ouro Negro Transportes created');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'            
        ]);
        $cliente = new Client();
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->phone = $request->phone;        
        $cliente->street = $request->street;        
        $cliente->number = $request->number;        
        $cliente->city = $request->city;        
        $cliente->state = $request->state;        
        $cliente->situation = $request->situation;
        $cliente->save();

        return redirect()->route('admin.client.index');
    }
}
