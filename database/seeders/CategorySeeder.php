<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(10)->create();

        $categories->each(function ($category) {
            $category->update([
                'parent_id' => $category->id,
            ]);
        });
    }
}
