<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = App\User::all();
      $posts = App\Post::all();

      $comments = factory(App\Comment::class, 70)->create()->each(function ($comment) use($users) {
        $comment->user()->associate($users->random()->id)->save();
      });

      $comments->each(function ($comment) use($posts) {
        $comment->post()->associate($posts->random()->id)->save();
      });
    }
}