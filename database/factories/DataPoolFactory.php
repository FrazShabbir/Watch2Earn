<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPool>
 */
class DataPoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref_no' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'listing_id' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 20),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'message' => $this->faker->text,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'plot_size' => $this->faker->randomNumber(2),
            'gfa' => $this->faker->randomNumber(2),
            'location' => $this->faker->address,
            'location_id' => $this->faker->numberBetween(1, 50),
            'type_id' => $this->faker->randomElement(['Buyer', 'Seller']),
            'medium_id' => $this->faker->randomElement([1, 2, 3]),
            'source_id' => $this->faker->randomElement([1, 2, 3]),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'is_archived' => $this->faker->boolean,
            'from_name' => $this->faker->name,
            'from_email' => $this->faker->email,
            'from_mobile' => $this->faker->phoneNumber,
            'group_name' => $this->faker->word,
            'shared_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_by_id' => $this->faker->numberBetween(1, 20),
            'updated_by_id' => $this->faker->numberBetween(1, 20),
            'deleted_by_id' => null,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
