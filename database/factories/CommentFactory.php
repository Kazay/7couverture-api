<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

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

$factory->define(Comment::class, function (Faker $faker)
{
  $date = $faker->date('Y-m-d').' '.$faker->time('H:i:s');

  return [
    'post_id' => 0,
    'user_id' => 0,
    'content' => $faker->sentence(10, TRUE),
    'isDeleted' => (bool) mt_rand(0, 1),
    'created_at' => $date,
    'updated_at' => $date,
  ];
});