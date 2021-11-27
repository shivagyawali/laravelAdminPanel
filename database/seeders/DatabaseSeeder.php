<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LoanTableSeeder;
use Database\Seeders\SettingsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
