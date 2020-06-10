<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=3 ; $i++)
        {
            for($j=1; $j<=8 ; $j++)
            {
                Course::create([
                    'category_id' => $i,
                    'trainer_id' => rand(1,5),
                    'name' => "course num $j cat num $i",
                    'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                    'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                    'price' => rand(1000,6000),
                    'img' => "$i$j.png",
                ]);
            }
        }
    }
}
