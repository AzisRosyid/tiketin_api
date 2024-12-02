<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckpointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkpoints = [
            ['name' => 'Jakarta', 'latitude' => -6.2088, 'longitude' => 106.8456, 'description' => 'The bustling capital of Indonesia.'],
            ['name' => 'Bandung', 'latitude' => -6.9175, 'longitude' => 107.6191, 'description' => 'Known for its cool weather and vibrant culture.'],
            ['name' => 'Surabaya', 'latitude' => -7.2575, 'longitude' => 112.7521, 'description' => 'The second largest city in Indonesia.'],
            ['name' => 'Yogyakarta', 'latitude' => -7.7956, 'longitude' => 110.3695, 'description' => 'A hub of classical Javanese culture.'],
            ['name' => 'Semarang', 'latitude' => -6.9667, 'longitude' => 110.4167, 'description' => 'A historic port city.'],
            ['name' => 'Malang', 'latitude' => -7.9797, 'longitude' => 112.6304, 'description' => 'Famous for its beautiful scenery.'],
            ['name' => 'Cirebon', 'latitude' => -6.7063, 'longitude' => 108.5570, 'description' => 'Known for its coastal charm and batik.'],
            ['name' => 'Solo', 'latitude' => -7.5666, 'longitude' => 110.8281, 'description' => 'Rich in tradition and history.'],
            ['name' => 'Purwokerto', 'latitude' => -7.4246, 'longitude' => 109.2322, 'description' => 'Known for its relaxed ambiance.'],
            ['name' => 'Tegal', 'latitude' => -6.8797, 'longitude' => 109.1256, 'description' => 'A city with a rich culinary heritage.'],
            ['name' => 'Bogor', 'latitude' => -6.5965, 'longitude' => 106.7972, 'description' => 'The city of rain.'],
            ['name' => 'Bekasi', 'latitude' => -6.2383, 'longitude' => 106.9756, 'description' => 'A modern urban area near Jakarta.'],
            ['name' => 'Tangerang', 'latitude' => -6.2024, 'longitude' => 106.6527, 'description' => 'Part of Greater Jakarta.'],
            ['name' => 'Depok', 'latitude' => -6.4025, 'longitude' => 106.7942, 'description' => 'A growing urban city.'],
            ['name' => 'Banten', 'latitude' => -6.4058, 'longitude' => 106.0640, 'description' => 'Home to historic sites.'],
            ['name' => 'Kudus', 'latitude' => -6.8048, 'longitude' => 110.8417, 'description' => 'Known for its Islamic culture.'],
            ['name' => 'Pekalongan', 'latitude' => -6.8898, 'longitude' => 109.6756, 'description' => 'Famous for its batik.'],
            ['name' => 'Blitar', 'latitude' => -8.0953, 'longitude' => 112.1628, 'description' => 'The hometown of Indonesia’s first president.'],
            ['name' => 'Madiun', 'latitude' => -7.6267, 'longitude' => 111.5158, 'description' => 'Known for its train industry.'],
            ['name' => 'Magelang', 'latitude' => -7.4706, 'longitude' => 110.2172, 'description' => 'Close to the famous Borobudur Temple.'],
            ['name' => 'Pasuruan', 'latitude' => -7.6452, 'longitude' => 112.9074, 'description' => 'A mix of coastal and mountainous terrain.'],
            ['name' => 'Jember', 'latitude' => -8.1836, 'longitude' => 113.6681, 'description' => 'Known for its tobacco production.'],
            ['name' => 'Probolinggo', 'latitude' => -7.7543, 'longitude' => 113.2155, 'description' => 'Famous for its proximity to Mount Bromo.'],
            ['name' => 'Cilacap', 'latitude' => -7.7170, 'longitude' => 109.0159, 'description' => 'A coastal city with a port.'],
            ['name' => 'Garut', 'latitude' => -7.2114, 'longitude' => 107.9080, 'description' => 'Famous for its dodol (sweet treats).'],
            ['name' => 'Banyuwangi', 'latitude' => -8.2192, 'longitude' => 114.3693, 'description' => 'Known as the Sunrise of Java.'],
            ['name' => 'Tasikmalaya', 'latitude' => -7.3505, 'longitude' => 108.2203, 'description' => 'A center for handmade crafts.'],
            ['name' => 'Kuningan', 'latitude' => -6.9833, 'longitude' => 108.4833, 'description' => 'A serene town near the mountains.'],
            ['name' => 'Cianjur', 'latitude' => -6.8162, 'longitude' => 107.1422, 'description' => 'Known for its agricultural products.'],
            ['name' => 'Sukabumi', 'latitude' => -6.9217, 'longitude' => 106.9285, 'description' => 'A destination for nature lovers.'],
        ];

        foreach ($checkpoints as $checkpoint) {
            DB::table('checkpoints')->insert([
                'name' => $checkpoint['name'],
                'latitude' => $checkpoint['latitude'],
                'longitude' => $checkpoint['longitude'],
                'description' => $checkpoint['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
