<?php

namespace Database\Factories;

use App\Models\Brief;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{

    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph,
            'brief_id' => Brief::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
