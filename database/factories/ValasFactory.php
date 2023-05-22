<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Valas>
 */
class ValasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'=> $this->faker->word(),
            'nilai_jual' => $this->faker->biasedNumberBetween(100,200),
            'nilai_beli'=> $this->faker->biasedNumberBetween(50,99),
            'tanggal_rate' => $this->faker->date()
        ];
    }
}
