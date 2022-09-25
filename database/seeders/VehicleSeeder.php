<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
                [
                    'renter_id' => 1,
                    'vehicle_name' => "nice-bus",
                    'volume_max' => 50,
                    'daily_price' => "30.50",
                    'km_price' => "0.13",
                ],
                [
                    'renter_id' => 2,
                    'vehicle_name' => "not-nice-bus",
                    'volume_max' => 20,
                    'daily_price' => "63.83",
                    'km_price' => "0.60",
                ],
                [
                    'renter_id' => 2,
                    'vehicle_name' => "very-nice-bus",
                    'volume_max' => 20,
                    'daily_price' => "10.50",
                    'km_price' => "0.11",
                ]
            ]
        );

    }
}
