<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->model = new User();
    }

    /**
     * Create a new user.
     *
     */
    public function create(Request $request)
    {
      $this->validateRequest($request);

      $user = User::create([
        'email' => $request->get('email'),
        'password'=> Hash::make($request->get('password'))
      ]);

      return response()->json(['data' => "User with id {$user->id} has been created"], 201);
    }

      /**
   * Update a specific user
   * @var Request
   * @var int user id
   * 
   * @return string JSON encoded return value
   */
  public function update(Request $request, $id)
  {
    $user = $this->model::findOrFail($id);

    $this->validateRequest($request);

    $user->email = $request->get('email');
    $user->password = Hash::make($request->get('password'));

    $user->save();

    return response()->json(['data' => "User with id {$user->id} has been updated"], 200);
  }

    public function validateRequest(Request $request){
      $rules = [
          'email' => 'required|email|unique:users', 
          'password' => 'required|min:7'
      ];
      $this->validate($request, $rules);
  }
}
