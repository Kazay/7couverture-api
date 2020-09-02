<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Insert custom user with admin role
    $adminId = App\Role::where('name', 'admin')->value('id');

    if($adminId !== NULL)
    {
      $data = [
        'role_id' => $adminId,
        'username' => 'drKazay',
        'firstname' => 'Kevin',
        'lastname' => 'Czaja',
        'email' => 'czajakevin@gmail.com',
        'password' => Hash::make('12345'),
        'created_at' => '2020-01-01 07:07:07',
        'updated_at' => '2020-01-01 07:07:07',
      ];
      
      User::create($data);
    }

    // Retrieve all roles
    $roles = App\Role::all();

    // Insert 10 new users for each roles
    if (!$roles->isEmpty())
    {
      foreach($roles as $role)
      {
        factory(User::class, 10)->create([
          'role_id' => $role->id,
        ]);
      }
    }
  }
}
