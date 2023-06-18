<?php

namespace Database\Seeders;

use App\Models\MasseuseServiceLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasseuseServiceLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasseuseServiceLanguage::factory()
            ->count(40)
            ->create();
    }
}
