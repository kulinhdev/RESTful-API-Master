<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::factory(100)->create();

        Product::all()->each(
            function (Product $product) {
                $categories = Category::all()->random(mt_rand(1, 10))->pluck('id');

                $product->categories()->attach($categories);
            }
        );
    }
}
