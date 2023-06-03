<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MassagePlace;

class MassagePlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MassagePlace::factory()
            ->count(10)
            ->create();
    }
}
