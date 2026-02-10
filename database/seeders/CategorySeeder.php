<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Grocery',
            'Fresh Produce',
            'Bakery',
            'Dairy',
            'Meat & Seafood',
            'Pantry',
            'Beverages',
            'Snacks',
            'Household',
            'Personal Care',
            'Wellness',
            'Home Goods',
            'Baby',
            'Pet Supplies',
        ];

        foreach ($names as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
