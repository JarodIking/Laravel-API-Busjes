<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class renterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('renters')->insert([
                [
                    'renter_name' => "hertz",
                    'website' => "www.hertz.com"
                ],
                [
                    'renter_name' => "Ad-rem",
                    'website' => "www.adrem.com"
                ],
            ]
        );
    }
}
