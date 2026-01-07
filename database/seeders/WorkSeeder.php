<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder  // used to pipulate the data using it's factory on db change
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::factory()->count(50)->create();
    }
}
