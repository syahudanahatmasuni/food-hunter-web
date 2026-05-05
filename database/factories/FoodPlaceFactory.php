<?php

namespace Database\Factories;

use App\Models\FoodPlace;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodPlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodPlace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 4),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->sentence(),
            'latitude' => rand(-690208, -693099) / 100000,
            'longitude' => rand(10759640, 10766519) / 100000,
            'about' => $this->faker->paragraph(),
            'favorite_menu' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'open_hours' => '19:00 - 23:00',
            'cover' => '',
            'rating' => rand(1, 50) / 10,
            'count_rating' => rand(1, 100)
        ];
    }
}
