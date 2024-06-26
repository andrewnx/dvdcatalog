<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Spindle 1', 'Spindle 2'];

        foreach ($locations as $location) {
            Location::create(['name' => $location]);
        }
    }
}
