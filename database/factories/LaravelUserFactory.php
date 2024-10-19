<?php

namespace Database\Factories;

use App\Models\LaravelUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaravelUserFactory extends Factory
{
    protected $model = LaravelUser::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 80),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
        ];
    }
}
