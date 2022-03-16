<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();
        Category::truncate();
        Post::truncate();

        // $user = User::factory()->create([
        //     'name' => 'Gracious Caiphe'
        // ]);

        Post::factory(30)->create();
        Category::factory(10)->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal',
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family',
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work',
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet, consectetur adipiscing elit',
        //     'body' => 'lorem ipsum dolar sit amet, consectetur adipiscing elit lorem sed it',
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet, consectetur adipiscing elit',
        //     'body' => 'lorem ipsum dolar sit amet, consectetur adipiscing elit lorem sed it',
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet, consectetur adipiscing elit',
        //     'body' => 'lorem ipsum dolar sit amet, consectetur adipiscing elit lorem sed it',
        // ]);
    }
}
