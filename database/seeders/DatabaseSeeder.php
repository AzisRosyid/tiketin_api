<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Azis Rosyid',
            'email' => 'azisrosyid@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->call([
            CheckpointsSeeder::class,       // Seed the checkpoints first
            BusDeparturesSeeder::class,     // Create bus departures after checkpoints
            BusesSeeder::class,               // Seed the buses next
            SeatsSeeder::class,             // Generate seats based on bus capacity
            BusSchedulesSeeder::class,      // Create schedules for buses and departures
        ]);
    }
}
