<?php

namespace Database\Factories;

use App\Models\Brief;
use App\Models\Category;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "description" => $this->faker->text(20),
            "price" => $this->faker->numberBetween(1, 2000),
            "category_id" => Category::factory(),
            "company_id" => Company::factory(),
            "photo" => "1676403038.png"
        ];
    }
}
