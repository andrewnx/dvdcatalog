<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;

class FormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats = ['DVD', 'Blu-ray', 'Digital'];

        foreach ($formats as $format) {
            Format::create(['name' => $format]);
        }
    }
}
