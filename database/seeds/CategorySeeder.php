<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'programming'
        ]);

        Category::create([
            'name' => 'marketing'
        ]);

        Category::create([
            'name' => 'language'
        ]);

    }
}
