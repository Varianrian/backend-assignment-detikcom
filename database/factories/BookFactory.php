<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(1),
            "description" => $this->faker->paragraph(1),
            "quantity" => $this->faker->numberBetween(1, 100),
            "book_category_id" => $this->faker->numberBetween(1, 5),
            "book_cover_image" => "https://via.placeholder.com/150",
            "book_file" => "https://via.placeholder.com/150",
        ];
    }
}
