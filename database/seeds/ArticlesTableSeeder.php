<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$faker = Faker::create();
    	foreach (range(1,20) as $index) {
	        DB::table('articles')->insert([
	            'users_id' 			=> $faker->numberBetween($min = 10, $max = 22),
	            'categories_id'		=>	$faker->numberBetween($min = 1, $max = 7),
	            'articles_title' 	=> $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'articles_desc' 	=> $faker->realText($maxNbChars = 200, $indexSize = 2),
	            'articles_img'	=>	$faker->imageUrl($width = 640, $height = 480),
	        ]);
        }
    }
}
