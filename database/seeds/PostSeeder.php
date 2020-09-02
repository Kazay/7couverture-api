<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = App\Category::all();
    // ATM, i'm only attributing posts to my custom user since
    // the website will have only one admin creating new posts
    $userId = App\User::where('email', 'czajakevin@gmail.com')->value('id');

    // Insert 3 new posts for each categories
    if($userId !== NULL && !$categories->isEmpty())
    {
      foreach($categories as $category)
      {
        factory(App\Post::class, 3)->create([
          'user_id' => $userId,
          'category_id' => $category->id, 
        ]);
      }
    }

    // Attach tags to posts newly created inside the pivot table
    $tags = App\Tag::all();

    App\Post::all()->each(function ($post) use ($tags) {
        $post->tags()->attach(
          $tags->random(rand(1, 3))->pluck('id')->toArray()
        );
    });
  }
}