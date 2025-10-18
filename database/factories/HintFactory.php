<?php

namespace Database\Factories;

use App\Models\Hint;
use Illuminate\Database\Eloquent\Factories\Factory;

class HintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
