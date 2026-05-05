<?php

namespace Database\Seeders;

use App\Models\FoodPlace;
use Illuminate\Database\Seeder;

class FoodPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodPlace::factory()->count(50)->create();
    }
}
