<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = App\Setting::create([
            'site_title' => 'Bank App',
            'site_email' => 'info@bank.com',
            'site_contact' => '08100998877',
            'site_address' => 'Benin, Edo State',
            'site_facebook' => 'https://www.facebook.com/bankapp',
            'site_twitter' => 'https://www.twitter.com/bankapp',
            'site_linkdn' => 'https://www.linkedIn.com/bankapp',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);
    }
}
