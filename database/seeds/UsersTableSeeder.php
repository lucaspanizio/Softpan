<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Http\Models\User::create([
           'name'=> 'Lucas Panizio',
           'email'=> 'teste@teste.com',
           'password'=> bcrypt('senha123'),
           'role'=> 'admin'       
        ]); 
    }
}
