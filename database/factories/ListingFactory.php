<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
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
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'listing_price' => $this->faker->randomFloat(2, 1000, 100000),
            'plot_size' => $this->faker->randomNumber(2),
            'listing_plot_size' => $this->faker->randomNumber(2),
            'gfa' => $this->faker->randomNumber(2),
            'listing_gfa' => $this->faker->randomNumber(2),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'developer_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 3),
            'owner_id' => $this->faker->numberBetween(1, 3),
            'location_id' => $this->faker->numberBetween(1, 10),
            'hide_price' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_verified' => $this->faker->boolean,
            'video_url' => $this->faker->url,
            'status' => $this->faker->randomElement(['DRAFT', 'PUBLISHED']),
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'deleted_by_id' => null,
            'created_at' => $this->faker->dateTimeBetween('-12 months', 'now'),
            'updated_at' => now(),
        ];
    }
}
