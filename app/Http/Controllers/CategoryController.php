<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
     * Get all categories
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(Category::all());
    }

    /**
     * Get specific category data
     * @var int category id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(Category::find($id));
    }

    /**
     * Insert a new category
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $category = Category::create($request->all());

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
      $category = Category::findOrFail($id);
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
      Category::findOrFail($id)->delete();
        return response('Category deleted Successfully', 200);
    }
}
