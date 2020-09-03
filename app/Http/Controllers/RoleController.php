<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
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
     * Get all roles
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(Role::all());
    }

    /**
     * Get specific role data
     * @var int role id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(Role::find($id));
    }

    /**
     * Insert a new role
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $role = Role::create($request->all());

      return response()->json($role, 201);
    }

    /**
     * Update a specific role
     * @var Request
     * @var int role id
     * 
     * @return string JSON encoded return value
     */
    public function update(Request $request, $id)
    {
      $role = Role::findOrFail($id);
      $role->update($request->all());

      return response()->json($role, 200);
    }

    /**
     * Delete a specific role
     * @var int role id
     * 
     * @return string JSON encoded return value
     */
    public function delete($id)
    {
      Role::findOrFail($id)->delete();
        return response('Role deleted Successfully', 200);
    }

}
