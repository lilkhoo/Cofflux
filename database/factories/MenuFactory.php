<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namamenu' => $this->faker->state(),   // Asal Aja Krn Tidak Ada Faker Menu
            'category_id' => mt_rand(1, 4),
            'pegawai_id' => mt_rand(1, 4),
            'slug' => $this->faker->slug(),
            'harga' => 10000,
            'deskripsi' => $this->faker->sentence(mt_rand(2, 8)),
            'ketersediaan' => 10
        ];
    }
}
