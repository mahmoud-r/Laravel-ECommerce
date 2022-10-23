<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'description' => ['en'=>$this->faker->text() ,'ar'=>$this->faker->text],
            'short_description' => ['en'=>$this->faker->text() ,'ar'=>$this->faker->text],
//            'name'=>['en'=>$this->faker->sentence() ,'ar'=>$this->faker->sentence()],
            'name'=>['en'=>'lap'.$this->faker->numberBetween(1,100) ,'ar'=>'lap'.$this->faker->numberBetween(1,100)],
            'quantity'=>$this->faker->numberBetween(1,20),
            'price'=>$this->faker->numberBetween(1000,20000),
            'old_price'=>$this->faker->numberBetween(20000,50000),
            'status'=>$this->faker->numberBetween(0,1),
            'featured'=>$this->faker->numberBetween(0,1),
            'best_seller'=>$this->faker->numberBetween(0,1),
            'brand_id'=>$this->faker->numberBetween(1,10),
            'Categorie_id'=>'6',
            'sub_Categorie_id'=>$this->faker->numberBetween(21,25),
        ];
    }
}
