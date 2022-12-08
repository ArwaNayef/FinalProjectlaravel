<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseTransaction>
 */
class PurchaseTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $products = Product::pluck('id')->toArray();
        $product_id = $this->faker->randomElement($products);
        $product = Product::find($product_id);
        if ($product->flag == 'base') {
            $price = $product->base_price;
        } else {
            $price = $product->discount_price;
        }
        return [
            'time_of_transaction' => $this->faker->dateTimeInInterval('-1 years','+5 days',$timezone=null),
            'price' => $price,
            'product_id' => $product_id
        ];
    }
}
