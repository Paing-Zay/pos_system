<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_code' => 'P001',
                'name' => 'Laptop',
                'category' => 'Electronics',
                'price' => 700,
                'cost_price' => 600,
                'stock' => 10,
                'status' => 'in_stock',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_code' => 'P002',
                'name' => 'Mouse',
                'category' => 'Accessories',
                'price' => 20,
                'cost_price' => 10,
                'stock' => 5,
                'status' => 'low_stock',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
