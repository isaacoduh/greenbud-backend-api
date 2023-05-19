<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentCategories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'icon' => 'fas fa-laptop',
            ]
        ];

        foreach ($parentCategories as $category) {
            Category::create($category);
        }
    }
}
