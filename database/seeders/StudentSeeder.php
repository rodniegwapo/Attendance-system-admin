<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::create([
            'first_name' => 'Rodnie',
            'last_name' => 'Lecera',
            'middle_name' => 'Amoy',
            'suffix' => '',
            'year_level_id' => 1,
        ]);

        \App\Models\Student::create([
            'first_name' => 'Arvil',
            'last_name' => 'Josol',
            'middle_name' => 'Bagsac',
            'suffix' => '',
            'year_level_id' => 2,
        ]);

        \App\Models\Student::create([
            'first_name' => 'Glenn',
            'last_name' => 'Tagapan',
            'middle_name' => 'Bagsac',
            'suffix' => '',
            'year_level_id' => 3,
        ]);

        \App\Models\Student::create([
            'first_name' => 'Ronel',
            'last_name' => 'Faigao',
            'middle_name' => 'Bagsac',
            'suffix' => '',
            'year_level_id' => 4,
        ]);
    }
}
