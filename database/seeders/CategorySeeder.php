<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'iPhone',
                'slug' => 'iphone',
                'description' => 'Najnowsze smartfony iPhone od Apple'
            ],
            [
                'name' => 'iPad',
                'slug' => 'ipad',
                'description' => 'Tablety iPad w różnych rozmiarach'
            ],
            [
                'name' => 'Mac',
                'slug' => 'mac',
                'description' => 'Komputery MacBook i iMac'
            ],
            [
                'name' => 'Apple Watch',
                'slug' => 'apple-watch',
                'description' => 'Inteligentne zegarki Apple Watch'
            ],
            [
                'name' => 'AirPods',
                'slug' => 'airpods',
                'description' => 'Bezprzewodowe słuchawki AirPods'
            ],
            [
                'name' => 'Akcesoria',
                'slug' => 'akcesoria',
                'description' => 'Różnorodne akcesoria do urządzeń Apple'
            ]
        ];

        foreach ($categories as $category){
            \App\Models\Category::create($category);
        }
    }
}
