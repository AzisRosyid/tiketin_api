<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusDeparturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch checkpoint IDs for randomization
        $checkpoints = DB::table('checkpoints')->pluck('id')->toArray();

        // Ensure there are enough checkpoints for random pairing
        if (count($checkpoints) < 2) {
            throw new \Exception('Not enough checkpoints to generate bus departures. Please seed the checkpoints table first.');
        }

        $busDepartures = [];
        for ($i = 1; $i <= 30; $i++) {
            do {
                // Randomly select start and end checkpoints
                $start = $checkpoints[array_rand($checkpoints)];
                $end = $checkpoints[array_rand($checkpoints)];
            } while ($start === $end); // Ensure start and end are not the same

            $busDepartures[] = [
                'name' => 'Route ' . $i,
                'checkpoint_start' => $start,
                'checkpoint_end' => $end,
                'multiplier' => mt_rand(100, 300) / 100, // Random multiplier between 1.00 and 2.00
                'description' => 'Bus route from checkpoint ' . $start . ' to ' . $end,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('bus_departures')->insert($busDepartures);
    }
}
