<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Event::create([
            'name' => 'Kalibulong',
            'date' => Carbon::now(),
        ]);
        \App\Models\Event::create([
            'name' => 'Acquaintance',
            'date' => Carbon::now(),
        ]);
        \App\Models\Event::create([
            'name' => 'Christmas Party',
            'date' => Carbon::now(),
        ]);
    }
}
