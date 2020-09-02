<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker)
{
  $date = $faker->date('Y-m-d').' '.$faker->time('H:i:s');
  return [
    'role_id' => 0,
    'username' => $faker->unique()->userName,
    'firstname' => $faker->firstName,
    'lastname' => $faker->lastName,
    'email' => $faker->unique()->safeEmail,
    'password' => Hash::make($faker->password),
    'created_at' => $date,
    'updated_at' => $date,
  ];
});