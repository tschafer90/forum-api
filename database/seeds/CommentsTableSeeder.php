<?php

use App\Models\Comment;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $userIds = User::all()->pluck('id')->toArray();
        $threadIds = Thread::all()->pluck('id')->toArray();
        
        foreach (range(1, 500) as $index) {
            Comment::create([
                'user_id' => $faker->randomElement($userIds),
                'thread_id' => $faker->randomElement($threadIds),
                'body' => $faker->paragraph,
            ]);
        }
    }
}
