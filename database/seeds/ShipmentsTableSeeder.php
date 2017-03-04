<?php

use Illuminate\Database\Seeder;

class ShipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(PackageTracking\Shipment::class, 50)->create();
    }
}
