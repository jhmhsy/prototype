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
                'price' => 999,
            ],
            [
                'service_type' => '1monthstudent',
                'price' => 850,
            ],
            [
                'service_type' => '3month',
                'price' => 2799,
            ],
            [
                'service_type' => '6month',
                'price' => 5400,
            ],
            [
                'service_type' => '12month',
                'price' => 9999,
            ],
            [
                'service_type' => 'Walkin',
                'price' => 150,
            ],
            [
                'service_type' => 'locker',
                'price' => 100,
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