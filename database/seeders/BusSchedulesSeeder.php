<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all bus and bus_departure IDs
        $buses = DB::table('buses')->pluck('id')->toArray();
        $busDepartures = DB::table('bus_departures')->pluck('id')->toArray();

        // Time slots for schedules
        $timeSlots = [
            '06:00:00',
            '09:00:00',
            '12:00:00',
            '15:00:00',
            '18:00:00',
            '21:00:00',
        ];

        $schedules = [];

        // Generate a schedule for each bus and departure across all days
        foreach ($buses as $busId) {
            foreach ($busDepartures as $departureId) {
                foreach (range(0, 6) as $day) { // Days of the week: 0 (Sunday) to 6 (Saturday)
                    $time = $timeSlots[array_rand($timeSlots)];

                    $schedules[] = [
                        'bus_id' => $busId,
                        'bus_departure_id' => $departureId,
                        'day' => $day,
                        'time' => $time,
                        'description' => "Schedule for bus $busId on day $day at $time.",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Insert the generated schedules into the database
        DB::table('bus_schedules')->insert($schedules);
    }
}
