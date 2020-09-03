<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get all users
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(User::all());
    }

    /**
     * Get specific user data
     * @var int user id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(User::find($id));
    }

    /**
     * Insert a new user
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $user = User::create($request->all());

      return response()->json($user, 201);
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
      $user = User::findOrFail($id);
      $user->update($request->all());

      return response()->json($user, 200);
    }

    /**
     * Delete a specific user
     * @var int user id
     * 
     * @return string JSON encoded return value
     */
    public function delete($id)
    {
      User::findOrFail($id)->delete();
        return response('User deleted Successfully', 200);
    }

}
