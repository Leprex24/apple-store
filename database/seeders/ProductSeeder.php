<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Kategoria 1 - iPhone
            [
                'category_id' => 1,
                'name' => 'iPhone 16 Pro',
                'slug' => 'iphone-16-pro',
                'description' => 'Ekran: 6.3" | Procesor: Apple A18 Pro | Pamięć wbudowana: 1 TB',
                'price' => 5129.00,
                'stock' => 50,
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 16',
                'slug' => 'iphone-16',
                'description' => 'Ekran: 6,1" | Procesor: Apple A18 | Pamięć wbudowana: 512 GB',
                'price' => 3999.00,
                'stock' => 75,
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 16e',
                'slug' => 'iphone-16e',
                'description' => 'Ekran: 6,1" | Procesor: Apple A18 | Pamięć wbudowana: 256 GB',
                'price' => 2999.00,
                'stock' => 100,
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 15',
                'slug' => 'iphone-15',
                'description' => 'Ekran: 6,1" | Procesor: Apple A16 Bionic | Pamięć wbudowana: 256 GB',
                'price' => 2799.00,
                'original_price' => 3499.00,
                'is_on_sale' => true,
                'discount_percentage' => 20,
                'stock' => 150,
                'is_featured' => false,
                'is_new' => false,
            ],
            //Kategoria 2 - iPad
            [
                'category_id' => 2,
                'name' => 'iPad Air',
                'slug' => 'ipad-air',
                'description' => 'Procesor: Apple M3 | Pamięć: 256 GB | Pamięć RAM: 8 GB | Przekątna: 11"',
                'price' => 2999.00,
                'stock' => 80,
                'is_featured' => true,
                'is_new' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'iPad mini',
                'slug' => 'ipad-mini',
                'description' => 'Procesor: Apple A17 Pro | Pamięć: 256 GB | Rozdzielczość: 2266 x 1488 | Przekątna: 8.3"',
                'price' => 2349.00,
                'original_price' => 2599.00,
                'is_on_sale' => true,
                'discount_percentage' => 10,
                'stock' => 60,
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'category_id' => 2,
                'name' => 'iPad',
                'slug' => 'ipad',
                'description' => 'Procesor: Apple A14 Bionic | Pamięć: 128 GB | Rozdzielczość: 2360 x 1640 | Przekątna: 10,9"',
                'price' => 1799.00,
                'stock' => 65,
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'iPad Pro',
                'slug' => 'ipad-pro',
                'description' => 'Procesor: Apple M4 | Pamięć: 1 TB | Pamięć RAM: 16 GB | Przekątna: 13"',
                'price' => 5299.00,
                'stock' => 40,
                'is_featured' => true,
                'is_new' => false,
            ],
            //Kategoria 3 - Mac
            [
                'category_id' => 3,
                'name' => 'MacBook Pro',
                'slug' => 'macbook-pro',
                'description' => 'Procesor: Apple M4 Pro | Pamięć: 24 GB | Grafika: Apple M4 Pro [20 rdzeni] | Typ ekranu: Matowy, mini-LED, Liquid Retina XDR',
                'price' => 9499.00,
                'original_price' => 9999.00,
                'is_on_sale' => true,
                'discount_percentage' => 5,
                'stock' => 30,
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'category_id' => 3,
                'name' => 'MacBook Air',
                'slug' => 'macbook-air',
                'description' => 'Procesor: Apple M3 | Pamięć: 16 GB | Apple M3 [10 rdzeni] | Typ ekranu: Błyszczący, LED, IPS, Liquid Retina',
                'price' => 4999.00,
                'stock' => 70,
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'iMac',
                'slug' => 'imac',
                'description' => 'Przekątna ekranu: 23,5" | Grafika: Apple M4 | Procesor: Apple M4 | Pamięć RAM: 32 GB',
                'price' => 10999.00,
                'original_price' => 11999.00,
                'is_on_sale' => true,
                'discount_percentage' => 8,
                'stock' => 25,
                'is_featured' => false,
                'is_new' => false,
            ],
            //Kategoria 4 - Apple Watch
            [
                'category_id' => 4,
                'name' => 'Apple Watch Series 10',
                'slug' => 'apple-watch-series-10',
                'description' => 'Czujnik: Akcelerometr, Wysokościomierz barometryczny, Elektrokardiogram, Echokardiogram, Kompas, Pulsksymetr, Pulsometr, Światła, Termometr, Żyroskop, Czujnik ruchu, Głębokościomierz | Nawigacja: Tak | Odporność: Odporność na wstrząsy, Pyłoszczelność, Wodoszczelność, Wodoszczelność 5 ATM, Wodoodporność | Czas pracy: do 18 godzin normalnego użytkowania, do 36 godzin w trybie oszczędzania energii',
                'price' => 1999.00,
                'stock' => 90,
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'category_id' => 4,
                'name' => 'Apple Watch Ultra 2',
                'slug' => 'apple-watch-ultra-2',
                'description' => 'Czujniki: Akcelerometr, Wysokościomierz barometryczny, Elektrokardiogram, Echokardiogram, Kompas, Pulsoksymetr, Pulsometr, Światła, Termometr, Żyroskop, Czujnik ruchu, Głębokościomierz | Nawigacja: Tak | Odporność: Odporność na wstrząsy, Pyłoszczelność, Wodoszczelność, Wodoszczelność 10 ATM, Standard militarny | Czas pracy: do 36 godzin normalnego użytkowania',
                'price' => 3999.00,
                'stock' => 110,
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'category_id' => 4,
                'name' => 'Apple Watch SE',
                'slug' => 'apple-watch-se',
                'description' => 'Czujniki: Akcelerometr, Wysokościomierz barometryczny, Kompas, Światła, Żyroskop, Czujnik ruchu | Nawigacja: Tak | Odporność: Odporność na wstrząsy, Wodoszczelność, Wodoszczelność 5 ATM | Czas pracy: do 18 godzin normalnego użytkowania',
                'price' => 800.00,
                'original_price' => 999.00,
                'is_on_sale' => true,
                'discount_percentage' => 20,
                'stock' => 120,
                'is_featured' => false,
                'is_new' => false,
            ],
            //Kategoria 5 - AirPods
            [
                'category_id' => 5,
                'name' => 'AirPods 4',
                'slug' => 'airpods-4',
                'description' => 'Łączność: True Wireless | Budowa słuchawek: Douszne | Mikrofon: Posiada, przy słuchawce | Redukcja hałasu: Pasywna',
                'price' => 649.00,
                'stock' => 200,
                'is_featured' => true,
                'is_new' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'AirPods 4 z ANC',
                'slug' => 'airpods-4-z-anc',
                'description' => 'Łączność: True Wireless | Budowa słuchawek: Douszne | Mikrofon: Posiada, przy słuchawce | Redukcja hałasu: Aktywna - ANC',
                'price' => 899.00,
                'stock' => 150,
                'is_featured' => false,
                'is_new' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'AirPods Pro 2',
                'slug' => 'airpods-pro-2',
                'description' => 'Łączność: True Wireless | Budowa słuchawek: Dokanałowe | Mikrofon: Posiada, przy słuchawce | Redukcja hałasu: Aktywna - ANC',
                'price' => 1099.00,
                'original_price' => 1199.00,
                'is_on_sale' => true,
                'discount_percentage' => 8,
                'stock' => 180,
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'AirPods Max',
                'slug' => 'airpods-max',
                'description' => 'Łączność: Bezprzewodowe | Budowa słuchawek: Nauszne, Zamknięte | Mikrofon: Posiada, przy słuchawce | Redukcja hałasu: Aktywna - ANC',
                'price' => 2499.00,
                'stock' => 50,
                'is_featured' => false,
                'is_new' => false,
            ],
            //Kategoria 6 - Akcesoria
            [
                'category_id' => 6,
                'name' => 'AirTag',
                'slug' => 'airtag',
                'description' => 'Rodzaj modułu: Lokalizator | Kolor: Srebrny | Kompatybilność: iPhone 11, iPhone 11 Pro, iPhone 11 Pro Max, iPhone 12, iPhone 12 mini, iPhone 12 Pro, iPhone 12 Pro Max, iPhone SE, iPhone 6s, iPod touch, iPad Pro, iPad, iPad Air, iPad mini, iPhone 13, iPhone 13 mini, iPhone 13 Pro, iPhone 13 Pro Max, iPhone 14, iPhone 14 Plus, iPhone 14 Pro, iPhone 14 Pro Max, iPhone 15 Plus, iPhone 15, iPhone 15 Pro, iPhone 15 Pro Max, iPhone 16, iPhone 16 Plus, iPhone 16 Pro, iPhone 16 Pro Max | Gwarancja: 12 miesięcy',
                'price' => 129.00,
                'original_price' => 149.00,
                'is_on_sale' => true,
                'discount_percentage' => 13,
                'stock' => 300,
                'is_featured' => true,
                'is_new' => false,
            ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
