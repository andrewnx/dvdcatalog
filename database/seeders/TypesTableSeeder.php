<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Movie', 'TV Show'];

        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}
