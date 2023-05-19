<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productList = [
            [
                'name' => 'Organic Cotton tshirts'
            ]
        ];

        foreach ($productList as $product) {
            Product::create($product);
        }
    }
}
