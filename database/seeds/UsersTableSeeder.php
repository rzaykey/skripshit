<?php

use Illuminate\Database\Seeder;
use App\User;

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
        	'name' => 'amir',
        	'email' => 'amirs@tes.com',
            'password' => bcrypt('tes'),
            'address' => 'ok',
            'status' => 1,
            'image' => 'default.png'
        ]);
    }
}
