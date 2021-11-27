<?php

namespace Database\Seeders;

use App\Models\Settings;
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
        Settings::create([
            'details' => 'Welcome to techtemple',
            'phone' => '9865092811',
            'address' => 'Butwal 10 Kalikanagar',
            'email' => 'info@techtemple.com',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://instagram.com',
            'tiktok' => 'https://www.tiktok.com/@techtempl'
        ]);
    }
}
