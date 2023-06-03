<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceLanguage;

class ServiceLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceLanguage::factory()
            ->count(15)
            ->create();
    }
}
