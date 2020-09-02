<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // roles to insert
    $data = [
      ['name' => 'admin'],
      ['name' => 'publisher'],
      ['name' => 'user'],
    ];

    DB::table('roles')->insert($data);
  }
}
