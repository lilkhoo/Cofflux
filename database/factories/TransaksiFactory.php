<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'nama_pelanggan' => $this->faker->firstNameMale(),
            'user_id' => mt_rand(1, 4),
            // 'pembuat' => $this->faker->name(),
            'menu_id' => mt_rand(1, 4),
            'jumlah' => mt_rand(1, 4),
            'tgl_transaksi' => $this->faker->date(),
            'total' => 100000
        ];
    }
}
