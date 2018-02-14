<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $categoryIds = Category::all()->pluck('id')->toArray();
        $userIds = User::all()->pluck('id')->toArray();
        
        foreach (range(1, 50) as $index) {
            Thread::create([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'title' => $faker->sentence($nbWords = 7, $variableNbWords = true),
                'body' => $faker->paragraph,
            ]);
        }
    }
}
