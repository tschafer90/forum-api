<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1,5) as $index) {
            Category::create([
                'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'description' => $faker->sentence
            ]);
        }
    }
}
