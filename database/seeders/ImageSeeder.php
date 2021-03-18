<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['src' => 'image1.jpg',],
            ['src' => 'image2.jpg',],
            ['src' => 'image3.jpg',],
            ['src' => 'image4.jpg',],
            ['src' => 'image5.jpg',],
            ['src' => 'image6.jpg',],
            ['src' => 'image7.jpg',],
        ]);
    }
}
