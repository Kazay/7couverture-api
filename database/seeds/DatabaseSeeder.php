<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call([CategorySeeder::class]);
    $this->call([TagSeeder::class]);
    $this->call([RoleSeeder::class]);
    $this->call([UserSeeder::class]);
    $this->call([PostSeeder::class]);
    $this->call([CommentSeeder::class]);
  }
}
