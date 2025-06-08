<?php

// database/factories/JobPostFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph,
        ];
    }
}
