<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('set foreign_key_checks = 0');
        
        User::truncate();
        Category::truncate();
        Thread::truncate();
        Comment::truncate();
    
        DB::statement('set foreign_key_checks = 1');
    
        Eloquent::unguard();
        
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
