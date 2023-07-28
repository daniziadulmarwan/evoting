<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{

    public function definition(): array
    {
        return [
            'position_id' => Position::first()->id,
            'fullname' => fake()->name(),
            'profile' => fake()->sentence(),
            'point' => mt_rand(10, 40)
        ];
    }
}
