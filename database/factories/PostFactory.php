<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker)
{
  $date = $faker->date('Y-m-d').' '.$faker->time('H:i:s');
  $title = $faker->unique()->sentence();

  return [
    'user_id' => 0,
    'category_id' => 0,
    'title' => $title,
    'slug' => str_to_slug($title),
    'content' => $faker->paragraphs(4, TRUE),
    'published_at' => NULL,
    'created_at' => $date,
    'updated_at' => $date,
  ];
});