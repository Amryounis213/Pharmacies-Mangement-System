<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicinesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $size = ['small' , 'large'];
        return [
            'name'=> $this->faker->sentence(1) ,
            'image'=> $this->faker->imageUrl(640 , 680) ,
            'description'=>$this->faker->realText(300) ,
            'usage'=>$this->faker->realText(300),
            'size' =>$size[rand(0,1)],
            'price'=> (float)rand(5, 200) ,
            'discount'=> (float)0,
            'category_id'=> 1,
            'status'=> 1 ,
        ];
    }
}
