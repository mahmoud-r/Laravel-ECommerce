<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategorieFactory extends Factory
{

    public function definition()
    {
        return [
            'name'=>['en'=>$this->faker->name ,'ar'=>$this->faker->name],
        ];
    }
}
