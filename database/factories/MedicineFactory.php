<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $categories = Category::get(['id']);
       $size = ['small' , 'large'];
        return [
            'name'=> $this->faker->sentence() ,
            'image'=> $this->faker->imageUrl(640 , 680) ,
            'description'=>$this->faker->realText(300) ,
            'usage'=>$this->faker->realText(300),
            'size' =>$size[rand(0,1)],
            'price'=> (float)rand(5, 200) ,
            'discount'=> (float)0,
            'category_id'=>$categories[rand(0 , $categories->count()-1)]->id ,
            'status'=> 1 ,
        ];
    }
}
