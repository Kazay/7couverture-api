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
   * Get all categories
   *
   * @return string JSON encoded return value
   */
  public function showAll()
  {
    return response()->json($this->model::all());
  }

  /**
   * Get specific category data
   * @var int category id
   * 
   * @return string JSON encoded return value
   */
  public function showOne($id)
  {
    return response()->json($this->model::find($id));
  }

  /**
   * Insert a new category
   * @var Request
   * 
   * @return string JSON encoded return value
   */
  public function create(Request $request)
  {
    $category = $this->model::create($request->all());

    return response()->json($category, 201);
  }

  /**
   * Update a specific category
   * @var Request
   * @var int category id
   * 
   * @return string JSON encoded return value
   */
  public function update(Request $request, $id)
  {
    $category = $this->model::findOrFail($id);
    $category->update($request->all());

    return response()->json($category, 200);
  }
  
  /**
   * Delete a specific category
   * @var int category id
   * 
   * @return string JSON encoded return value
   */
  public function delete($id)
  {
    $this->model::findOrFail($id)->delete();
      return response('Entry deleted Successfully', 200);
  }
}
