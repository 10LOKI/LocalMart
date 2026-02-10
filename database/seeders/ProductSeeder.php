<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::query()->get();
        if ($categories->isEmpty()) {
            $categories = Category::factory()->count(8)->create();
        }

        $sellers = User::role('seller')->get();
        if ($sellers->isEmpty()) {
            $sellers = User::factory()
                ->count(3)
                ->create()
                ->each(fn (User $user) => $user->syncRoles(['seller']));
        }

        $products = Product::factory()->count(60)->make();
        $products->each(function (Product $product) use ($categories, $sellers) {
            $product->category_id = $categories->random()->id;
            $product->seller_id = $sellers->random()->id;
            $product->save();
        });
    }
}
