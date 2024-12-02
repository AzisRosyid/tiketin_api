<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all buses with their capacities
        $buses = DB::table('buses')->select('id', 'capacity')->get();

        $seats = [];

        foreach ($buses as $bus) {
            for ($i = 1; $i <= $bus->capacity; $i++) {
                $seats[] = [
                    'bus_id' => $bus->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert the generated seats into the database
        DB::table('seats')->insert($seats);
    }
}
