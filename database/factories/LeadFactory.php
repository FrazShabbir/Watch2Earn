<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        $nameParts = explode(' ', $name);

        // Generate a random date within the past 12 months
        $createdAt = $this->faker->dateTimeBetween('-12 months', 'now');

        return [
            'first_name' => $nameParts[0],
            'last_name' => count($nameParts) > 1 ? end($nameParts) : null,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'type_id' => $this->faker->randomElement([1, 2, 3]),
            'source_id' => $this->faker->randomElement([1, 2, 3]),
            'medium_id' => $this->faker->randomElement([1, 2, 3]),
            'created_by_id' => 1,
            'user_id' => 1,
            // where status is either SUCCESSFUL or NEW, CONTACTED
            'status' => $this->faker->randomElement(['SUCCESSFUL', 'NEW', 'CONTACTED']),
            'ref_no' => rand(100, 9999).rand(100, 999).rand(100, 9999),
            'created_at' => $createdAt,
        ];
    }
}
