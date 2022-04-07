<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Clothes',
            'slug' => Str::slug('Clothes'),
        ]);

        Category::create([
            'name' => 'Elctrical devices',
            'slug' => Str::slug('Elctrical devices'),
        ]);

        Category::create([
            'name' => 'Home tools',
            'slug' => Str::slug('Home tools'),
        ]);
    }
}
