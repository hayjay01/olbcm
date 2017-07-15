<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Admin::create([
        	'name' => 'Admin Admin',
        	'email' => 'admin@gmail.com',
        	'username' => 'admin',
        	'password' => bcrypt('administrator'),
        	]);

        App\Profile::create([
            'admin_id' => $admin->id,
            'phone_number' => '08000000000',
            'address' => 'Edo, Benin City',
            'sex' => 'Male',
            'state' => 'Lagos',
            'nationality' => 'Nigeria',
        ]);
    }
}
