<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::create([
            'id' => 1,
            'name' => 'Jerry',
            'tag' => 'raton'
        ]);

        Pet::create([
            'id' => 2,
            'name' => 'Tom',
            'tag' => 'gato'
        ]);
    }
}
