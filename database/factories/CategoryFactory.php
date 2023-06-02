<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ctg_name = $this->faker->unique()->words($nb=2,$asText = true);
        $ctg = Str::ctg($ctg_name,'-'); //slug

        return [
            'name' => $ctg_name,
            'ctg' => $ctg
        ];
    }
}
