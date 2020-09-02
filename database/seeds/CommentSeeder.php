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
      $posts = App\Posts::all();

      $comments = factory(App\Comment::class, 70)->create()->each(function ($comment){
        $comment->user()->save($users->random()->id);
      });

      $comments->each(function ($comment){
        $comment->post()->save($posts->random()->id);
      });
    }
}