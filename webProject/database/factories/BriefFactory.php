<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BriefFactory extends Factory
{

    public function definition()
    {
        return [
            'slug'=>$this->faker->slug,
            'body'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(15)).'</p>',
            'excerpt'=>'<p>'.implode('</p><p>',$this->faker->paragraphs(15)).'</p>',
            'title'=>$this->faker->title,
        ];
    }
}
