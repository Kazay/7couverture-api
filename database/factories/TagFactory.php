<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
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

$factory->define(Tag::class, function (Faker $faker)
{
  $date = $faker->date('Y-m-d').' '.$faker->time('H:i:s');

  return [
    'name' => $faker->unique()->word,
    'created_at' => $date,
    'updated_at' => $date,
  ];
});