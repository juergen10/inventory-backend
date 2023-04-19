<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_uuid' => (string) Str::orderedUuid(),
            'variant_uuid' => (string) Str::orderedUuid(),
            'sku' => 'sku 123',
            'price' => 1000,
            'stock' => 10,
            'weight' => 10, //gram
        ];
    }
}