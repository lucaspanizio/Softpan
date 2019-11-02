<?php

use Illuminate\Database\Seeder;
use App\Http\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'LUCAS PANIZIO',
            'email' => 'teste@teste.com',
            'password' => bcrypt('senha123'),
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('User Lucas Panizio created');

        User::create([
            'name' => 'MARIO ADANYIA',
            'email' => 'teste1@teste.com',
            'password' => bcrypt('senha123'),
            'situation' => true
        ]);

        // Exibe uma informação no console durante o processo de seed
        $this->command->info('User Mario Adanyia created');
    }
}
