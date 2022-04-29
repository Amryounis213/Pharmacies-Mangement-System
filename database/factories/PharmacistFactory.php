<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacist>
 */
class PharmacistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = Pharmacy::get(['id']);
        return [
            'name'=> $this->faker->name ,
            'image'=> $this->faker->imageUrl(360),
            'mobile'=> $this->faker->numerify('###-###-####'),
            'pharmacy_id'=>$categories[rand(0 , $categories->count()-1)]->id ,
            'status'=> 1 ,
        ];
    }
}
