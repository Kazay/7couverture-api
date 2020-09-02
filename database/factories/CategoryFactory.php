<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
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

$factory->define(App\Category::class, function (Faker $faker)
{
  $date = $faker->date('Y-m-d').' '.$faker->time('H:i:s');

  return [
    'name' => $faker->unique()->word,
    'description' => $faker->paragraph(2, TRUE),
    'created_at' => $date,
    'updated_at' => $date,
  ];
});