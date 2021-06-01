<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Institution::factory()->count(4)->create();
        Pet::factory()->count(4)->create();
    }
}