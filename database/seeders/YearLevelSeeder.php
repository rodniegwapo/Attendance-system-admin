<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\YearLevel::create([
            'name' => 'First Year',
        ]);
        \App\Models\YearLevel::create([
            'name' => 'Second Year',
        ]);
        \App\Models\YearLevel::create([
            'name' => 'Third Year',
        ]);
        \App\Models\YearLevel::create([
            'name' => 'Fourth Year',
        ]);
    }
}
