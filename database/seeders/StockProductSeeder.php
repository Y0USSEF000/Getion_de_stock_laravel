<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StockProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert 30 products for each category
        $categories = ['clothes', 'electronics', 'video games', 'books', 'mandas'];

        foreach ($categories as $category) {
            for ($i = 0; $i < 30; $i++) {
                DB::table('stock_products')->insert([
                    'product_name' => $faker->word,
                    'product_price' => $faker->randomFloat(2, 10, 100),
                    'product_quantity' => $faker->numberBetween(1, 50),
                    'product_description' => $faker->sentence,
                    'product_type' => $category,
                    'product_img' => $faker->imageUrl(640, 480, 'cats'), // Example image URL
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
