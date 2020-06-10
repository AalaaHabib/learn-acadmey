<?php

use Illuminate\Database\Seeder;
use App\Testmonial;

class TestmonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testmonial::create([
            'name' => 'mohamed',
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'img' => '1.png'
        ]);

        Testmonial::create([
            'name' => 'ahmed',
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'img' => '2.png'
        ]);

        Testmonial::create([
            'name' => 'hema',
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'img' => '3.png'
        ]);
    }
}
