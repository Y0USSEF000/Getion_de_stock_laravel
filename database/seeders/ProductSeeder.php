<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();

        Product::create([
            'name' => 'Produit avec description',
            'price' => 49.99,
            'description' => 'Ceci est une description exemple',
            ]);
    }
}
