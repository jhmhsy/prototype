<?php

namespace Database\Seeders;

use App\Models\Prices;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            [
                'service_type' => '1month',
                'price' => 100,
            ],
            [
                'service_type' => '1monthstudent',
                'price' => 110,
            ],
            [
                'service_type' => '3month',
                'price' => 300,
            ],
            [
                'service_type' => '6month',
                'price' => 600,
            ],
            [
                'service_type' => '12month',
                'price' => 1200,
            ],
            [
                'service_type' => 'locker',
                'price' => 200,
            ],
            [
                'service_type' => 'treadmill',
                'price' => 200,
            ],
        ];

        foreach ($prices as $priceData) {
            Prices::create($priceData);
        }
    }
}