<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
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
        $product_name = $this->faker->unique()->words($nb=6,$asText = true);
        $ctg = Str::ctg($product_name,'-'); //slug
        return [
            'name' =>$product_name,
            'ctg' => $ctg,
            'shortDesc' =>$this->faker->text(200),
            'description' =>$this->faker->text(500),
            'oriPrice' => $this->faker->numberBetween(10,500),
            'sku'=> 'prd'.$this->faker->unique()->numberBetween(100,500),
            'stockStatus' =>'instock',
            'quantity' =>$this->faker->numberBetween(10,50),
            'img' => 'product-'.$this->faker->numberBetween(1,16),
            'ctgId'=>$this->faker->numberBetween(1,5) //ada error  Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails 
        ];
    }
}
