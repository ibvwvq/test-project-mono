<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Car::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
