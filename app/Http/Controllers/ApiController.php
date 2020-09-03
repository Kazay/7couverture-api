<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

  /**
   * Get all records
   *
   * @return string JSON encoded return value
   */
  public function showAll()
  {
    return response()->json($this->model::all());
  }

  /**
   * Get specific record
   * @var int record id
   * 
   * @return string JSON encoded return value
   */
  public function showOne($id)
  {
    return response()->json($this->model::find($id));
  }

  /**
   * Insert a new record
   * @var Request
   * 
   * @return string JSON encoded return value
   */
  public function create(Request $request)
  {
    $object = $this->model::create($request->all());

    return response()->json($object, 201);
  }

  /**
   * Update a specific record
   * @var Request
   * @var int record id
   * 
   * @return string JSON encoded return value
   */
  public function update(Request $request, $id)
  {
    $object = $this->model::findOrFail($id);
    $object->update($request->all());

    return response()->json($object, 200);
  }
  
  /**
   * Delete a specific record
   * @var int record id
   * 
   * @return string JSON encoded return value
   */
  public function delete($id)
  {
    $this->model::findOrFail($id)->delete();
      return response('Entry deleted Successfully', 200);
  }
}
