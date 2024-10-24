<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'user_id' => User::inRandomOrder()->value('id'),
          'idt' => Str::uuid(),
          'title' => $this->faker->sentence(),
          'is_completed' => rand(1,0),
          'is_priority' => rand(1,0),
          'deadline' => $this->faker->dateTimeBetween('-1 months', '+2 months'),
        ];
    }
}
