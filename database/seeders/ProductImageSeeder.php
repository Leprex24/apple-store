<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Product;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iphone16pro = Product::where('slug', 'iphone-16-pro')->first();

        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iphone16pro-miniatura.jpeg',
            'is_primary' => true,
        ]);
        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iPhone16Pro-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => false,
        ]);
        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iPhone16Pro-galeria-2.jpeg',
            'order' => 2,
            'is_primary' => false,
        ]);
        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iPhone16Pro-galeria-3.jpeg',
            'order' => 3,
            'is_primary' => false,
        ]);
        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iPhone16Pro-galeria-4.jpeg',
            'order' => 4,
            'is_primary' => false,
        ]);
        $iphone16pro->images()->create([
            'image_path' => 'products/iPhone/iPhone16Pro/iPhone16Pro-galeria-5.jpeg',
            'order' => 5,
            'is_primary' => false,
        ]);

        $iphone16 = Product::where('slug', 'iphone-16')->first();
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iphone16-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => false,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-2.jpeg',
            'order' => 2,
            'is_primary' => false,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-3.jpeg',
            'order' => 3,
            'is_primary' => false,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-4.jpeg',
            'order' => 4,
            'is_primary' => false,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-5.jpeg',
            'order' => 5,
            'is_primary' => false,
        ]);
        $iphone16->images()->create([
            'image_path' => 'products/iPhone/iPhone16/iPhone16-galeria-6.jpeg',
            'order' => 6,
            'is_primary' => false,
        ]);

        $iphone16e = Product::where('slug', 'iphone-16e')->first();
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => false,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-2.jpeg',
            'order' => 2,
            'is_primary' => false,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-3.jpeg',
            'order' => 3,
            'is_primary' => false,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-4.jpeg',
            'order' => 4,
            'is_primary' => false,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-5.jpeg',
            'order' => 5,
            'is_primary' => false,
        ]);
        $iphone16e->images()->create([
            'image_path' => 'products/iPhone/iPhone16e/iPhone16e-galeria-6.jpeg',
            'order' => 6,
            'is_primary' => false,
        ]);

        $iphone15 = Product::where('slug', 'iphone-15')->first();
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-6.png',
            'order' => 6,
            'is_primary' => false,
        ]);
        $iphone15->images()->create([
            'image_path' => 'products/iPhone/iPhone15/iPhone15-galeria-7.png',
            'order' => 7,
            'is_primary' => false,
        ]);

        $macbookpro = Product::where('slug', 'macbook-pro')->first();
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookProM4-ikona.png',
            'is_primary' => true,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);
        $macbookpro->images()->create([
            'image_path' => 'products/Mac/MacBookPro/MacBookPro-galeria-6.png',
            'order' => 6,
            'is_primary' => false,
        ]);

        $macbookair = Product::where('slug', 'macbook-air')->first();
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-ikona.jpeg',
            'is_primary' => true,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);
        $macbookair->images()->create([
            'image_path' => 'products/Mac/MacBookAir/MacBookAir-galeria-6.png',
            'order' => 6,
            'is_primary' => false,
        ]);

        $imac = Product::where('slug', 'imac')->first();
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-ikona.jpeg',
            'is_primary' => true,
        ]);
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $imac->images()->create([
            'image_path' => 'products/Mac/iMac/iMac-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);

        $ipadpro = Product::where('slug', 'ipad-pro')->first();
        $ipadpro->images()->create([
            'image_path' => 'products/iPad/iPadPro/iPadPro-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $ipadpro->images()->create([
            'image_path' => 'products/iPad/iPadPro/iPadPro-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => false,
        ]);
        $ipadpro->images()->create([
            'image_path' => 'products/iPad/iPadPro/iPadPro-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $ipadpro->images()->create([
            'image_path' => 'products/iPad/iPadPro/iPadPro-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $ipadpro->images()->create([
            'image_path' => 'products/iPad/iPadPro/iPadPro-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);

        $ipadmini = Product::where('slug', 'ipad-mini')->first();
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-ikonka.jpg',
            'is_primary' => true,
        ]);
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $ipadmini->images()->create([
            'image_path' => 'products/iPad/iPadmini/iPadmini-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);

        $ipadair = Product::where('slug', 'ipad-air')->first();
        $ipadair->images()->create([
            'image_path' => 'products/iPad/iPadAir/iPadAir-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $ipadair->images()->create([
            'image_path' => 'products/iPad/iPadAir/iPadAir-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => false,
        ]);
        $ipadair->images()->create([
            'image_path' => 'products/iPad/iPadAir/iPadAir-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $ipadair->images()->create([
            'image_path' => 'products/iPad/iPadAir/iPadAir-galeria-3.jpeg',
            'order' => 3,
            'is_primary' => false,
        ]);
        $ipadair->images()->create([
            'image_path' => 'products/iPad/iPadAir/iPadAir-galeria-4.jpeg',
            'order' => 4,
            'is_primary' => false,
        ]);

        $ipad = Product::where('slug', 'ipad')->first();
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-ikonka.jpeg',
            'is_primary' => true,
        ]);
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $ipad->images()->create([
            'image_path' => 'products/iPad/iPad/iPad-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);

        $applewatchultra2 = Product::where('slug', 'apple-watch-ultra-2')->first();
        $applewatchultra2->images()->create([
            'image_path' => 'products/Apple Watch/WatchUltra2/WatchUltra2-ikona.jpeg',
            'is_primary' => true,
        ]);
        $applewatchultra2->images()->create([
            'image_path' => 'products/Apple Watch/WatchUltra2/WatchUltra2-galeria-1.webp',
            'order' => 1,
            'is_primary' => false,
        ]);
        $applewatchultra2->images()->create([
            'image_path' => 'products/Apple Watch/WatchUltra2/WatchUltra2-galeria-2.webp',
            'order' => 2,
            'is_primary' => false,
        ]);
        $applewatchultra2->images()->create([
            'image_path' => 'products/Apple Watch/WatchUltra2/WatchUltra2-galeria-3.webp',
            'order' => 3,
            'is_primary' => false,
        ]);
        $applewatchultra2->images()->create([
            'image_path' => 'products/Apple Watch/WatchUltra2/WatchUltra2-galeria-4.webp',
            'order' => 4,
            'is_primary' => false,
        ]);

        $applewatchseries10 = Product::where('slug', 'apple-watch-series-10')->first();
        $applewatchseries10->images()->create([
            'image_path' => 'products/Apple Watch/WatchSeries10/WatchSeries10-ikona.jpeg',
            'is_primary' => true,
        ]);
        $applewatchseries10->images()->create([
            'image_path' => 'products/Apple Watch/WatchSeries10/WatchSeries10-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $applewatchseries10->images()->create([
            'image_path' => 'products/Apple Watch/WatchSeries10/WatchSeries10-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $applewatchseries10->images()->create([
            'image_path' => 'products/Apple Watch/WatchSeries10/WatchSeries10-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $applewatchseries10->images()->create([
            'image_path' => 'products/Apple Watch/WatchSeries10/WatchSeries10-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);

        $applewatchse = Product::where('slug', 'apple-watch-se')->first();
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-ikona.jpeg',
            'is_primary' => true,
        ]);
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-galeria-1.png',
            'order' => 1,
            'is_primary' => false,
        ]);
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-galeria-2.png',
            'order' => 2,
            'is_primary' => false,
        ]);
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-galeria-3.png',
            'order' => 3,
            'is_primary' => false,
        ]);
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-galeria-4.png',
            'order' => 4,
            'is_primary' => false,
        ]);
        $applewatchse->images()->create([
            'image_path' => 'products/Apple Watch/WatchSE/WatchSE-galeria-5.png',
            'order' => 5,
            'is_primary' => false,
        ]);

        $airtag = Product::where('slug', 'airtag')->first();
        $airtag->images()->create([
            'image_path' => 'products/Accessories/AirTag/AirTag-galeria-1.jpeg',
            'order' => 1,
            'is_primary' => true,
        ]);
        $airtag->images()->create([
            'image_path' => 'products/Accessories/AirTag/AirTag-galeria-2.jpeg',
            'order' => 2,
            'is_primary' => false,
        ]);
        $airtag->images()->create([
            'image_path' => 'products/Accessories/AirTag/AirTag-galeria-3.jpeg',
            'order' => 3,
            'is_primary' => false,
        ]);
        $airtag->images()->create([
            'image_path' => 'products/Accessories/AirTag/AirTag-galeria-4.jpeg',
            'order' => 4,
            'is_primary' => false,
        ]);

        $airpodspro2 = Product::where('slug', 'airpods-pro-2')->first();
        $airpodspro2->images()->create([
            'image_path' => 'products/AirPods/AirPodsPro2/AirPodsPro2-ikona-1.jpeg',
            'is_primary' => true,
        ]);
        $airpodspro2->images()->create([
            'image_path' => 'products/AirPods/AirPodsPro2/AirPodsPro2-galeria-1.webp',
            'order' => 1,
            'is_primary' => false,
        ]);
        $airpodspro2->images()->create([
            'image_path' => 'products/AirPods/AirPodsPro2/AirPodsPro2-galeria-2.webp',
            'order' => 2,
            'is_primary' => false,
        ]);

        $airpodsmax = Product::where('slug', 'airpods-max')->first();
        $airpodsmax->images()->create([
            'image_path' => 'products/AirPods/AirPodsMax/AirPodsMax-ikona-1.jpg',
            'is_primary' => true,
        ]);
        $airpodsmax->images()->create([
            'image_path' => 'products/AirPods/AirPodsMax/AirPodsMax-galeria-1.webp',
            'order' => 1,
            'is_primary' => false,
        ]);
        $airpodsmax->images()->create([
            'image_path' => 'products/AirPods/AirPodsMax/AirPodsMax-galeria-2.webp',
            'order' => 2,
            'is_primary' => false,
        ]);
        $airpodsmax->images()->create([
            'image_path' => 'products/AirPods/AirPodsMax/AirPodsMax-galeria-3.webp',
            'order' => 3,
            'is_primary' => false,
        ]);
        $airpodsmax->images()->create([
            'image_path' => 'products/AirPods/AirPodsMax/AirPodsMax-galeria-4.webp',
            'order' => 4,
            'is_primary' => false,
        ]);

        $airpods4 = Product::where('slug', 'airpods-4')->first();
        $airpods4->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-ikona-1.jpeg',
            'is_primary' => true,
        ]);
        $airpods4->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-1.webp',
            'order' => 1,
            'is_primary' => false,
        ]);
        $airpods4->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-2.webp',
            'order' => 2,
            'is_primary' => false,
        ]);
        $airpods4->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-3.webp',
            'order' => 3,
            'is_primary' => false,
        ]);
        $airpods4->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-4.webp',
            'order' => 4,
            'is_primary' => false,
        ]);

        $airpods42 = Product::where('slug', 'airpods-4-z-anc')->first();
        $airpods42->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-ikona-2.jpeg',
            'is_primary' => true,
        ]);
        $airpods42->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-1.webp',
            'order' => 1,
            'is_primary' => false,
        ]);
        $airpods42->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-2.webp',
            'order' => 2,
            'is_primary' => false,
        ]);
        $airpods42->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-3.webp',
            'order' => 3,
            'is_primary' => false,
        ]);
        $airpods42->images()->create([
            'image_path' => 'products/AirPods/AirPods4/AirPods4-galeria-4.webp',
            'order' => 4,
            'is_primary' => false,
        ]);
    }
}
