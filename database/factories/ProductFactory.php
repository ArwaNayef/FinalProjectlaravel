<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $stores = Store::pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->realText(400),

            'photo' => storage::disk('public')->url($this->faker->imageUrl),
            'base_price' => $this->faker->randomFloat('',3,150),
            'discount_price' => $this->faker->randomFloat('',3,150),
            'flag' => $this->faker->randomElement(['base', 'discount']),
            'store_id' => $this->faker->randomElement($stores)
        ];
    }
}
