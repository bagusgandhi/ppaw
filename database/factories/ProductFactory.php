<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis_id' => $this->faker->numberBetween(1, 7),
            'nama_barang' => $this->faker->title(12),
            'satuan' => 'kg',
            'harga' => $this->faker->numberBetween(51700, 72900),
            'stok' => $this->faker->numberBetween(2, 150),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
