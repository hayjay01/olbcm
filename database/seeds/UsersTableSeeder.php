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
        $user = App\User::create([
        	'name' => 'Olive',
        	'email' => 'olive@gmail.com',
        	'username' => 'Olive',
        	'password' => bcrypt('olive'),
        	]);

        App\Role::create([
            'user_id' => $user->id,
            'customer' => 0,
            'guest' => 1,
            ]);
        
        App\Profile::create([
            'user_id' => $user->id,
            'phone_number' => '08000000000',
            'address' => 'Lagos',
            'sex' => 'Male',
            'state' => 'Lagos',
            'nationality' => 'Nigeria',
        ]);
    }
}
