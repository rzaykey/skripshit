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
<<<<<<< HEAD
        	'email' => 'amirs@tes.com',
            'password' => bcrypt('tes'),
            'address' => 'ok',
            'status' => 1,
            'image' => 'default.png'
=======
            'email' => 'amir@tes.com',
            'address' => 'Banjarmasin',
            'password' => bcrypt('tes'),
            'address' => '122',
            'image' => 'ok',
            'status' => 1
>>>>>>> f7e58606a351aca8f0478ba57d32999b7e3809f3
        ]);
    }
}
