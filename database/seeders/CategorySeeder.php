<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Insertar las categorías iniciales.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pan tradicional',
                'description' => 'Panes tradicionales elaborados por la panadería.',
            ],
            [
                'name' => 'Pan dulce',
                'description' => 'Variedad de panes dulces.',
            ],
            [
                'name' => 'Pasteles',
                'description' => 'Pasteles para diferentes ocasiones.',
            ],
            [
                'name' => 'Repostería',
                'description' => 'Productos variados de repostería.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
