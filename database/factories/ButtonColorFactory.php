<?php

namespace Database\Factories;

use App\ButtonColor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\ButtonColor>
 */
class ButtonColorFactory extends Factory
{

    protected $model = ButtonColor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = ['red', 'blue', 'green', 'yellow'];
        return [
            'color' => $this->faker->unique()->randomElement($colors)
        ];
    }
}
