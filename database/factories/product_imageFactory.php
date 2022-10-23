<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product_image>
 */
class product_imageFactory extends Factory
{

    public function definition()
    {
        return [
//           'product_id'=>$this->faker->numberBetween(3,1000)  ,
            'product_id'=>$this->faker->numberBetween(101,200),
            'name'=>'1 ('.$this->faker->numberBetween(25,26).').JPG' ,
        ];
    }
}
