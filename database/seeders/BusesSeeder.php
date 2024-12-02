<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $busClasses = ['Economy', 'Business', 'Executive'];

        $buses = [
            [
                'name' => 'Java Express',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 40,
                'price' => 150000,
                'description' => 'Comfortable bus with excellent service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mount View Travel',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 30,
                'price' => 120000,
                'description' => 'Ideal for scenic routes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coastal Lines',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 50,
                'price' => 170000,
                'description' => 'Comfortable long-distance travel along the coast.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sunda Straits Bus',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 45,
                'price' => 160000,
                'description' => 'High-capacity bus service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'City Commuter',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 35,
                'price' => 100000,
                'description' => 'Quick and efficient for city-to-city routes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Island Cruiser',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 40,
                'price' => 200000,
                'description' => 'Luxury travel across the island.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Java Fast Travel',
                'class' => $busClasses[array_rand($busClasses)],
                'capacity' => 20,
                'price' => 110000,
                'description' => 'Fast and reliable service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Executive Riders',
                'class' => 'Executive',
                'capacity' => 25,
                'price' => 300000,
                'description' => 'Top-tier executive travel experience.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budget Runners',
                'class' => 'Economy',
                'capacity' => 50,
                'price' => 80000,
                'description' => 'Affordable travel for everyone.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elite Lines',
                'class' => 'Executive',
                'capacity' => 15,
                'price' => 350000,
                'description' => 'Exclusive and premium service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('buses')->insert($buses);
    }
}
