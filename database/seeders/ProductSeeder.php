<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::factory(1)->create([
            'name' => 'Product 1',
            'description' => 'Contoh product 1'
        ]);

        $productVariant = ProductVariant::factory(1)->create([
            'product_uuid' => $product[0]->uuid,
        ]);
    }
}