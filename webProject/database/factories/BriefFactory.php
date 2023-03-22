<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BriefFactory extends Factory
{

    public function definition()
    {
        return [
            'slug'=>$this->faker->slug,
            'offer_id' => Offer::factory(),
            'body'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(15)).'</p>',
            'excerpt'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(15)).'</p>',
            'title'=>$this->faker->title,
        ];
    }
}
