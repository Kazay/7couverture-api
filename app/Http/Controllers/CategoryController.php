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
     * Create a new controller instance.
     *
     * @return
     */
    public function showAll()
    {
      return response()->json(Category::all());
    }

    public function showOne($id)
    {
      return response()->json(Category::find($id));
    }

    public function create(Request $request)
    {
      $category = Category::create($request->all());

      return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
      $category = Category::findOrFail($id);
      $category->update($request->all());

      return response()->json($category, 200);
    }

    public function delete($id)
    {
      Category::findOrFail($id)->delete();
        return response('Category deleted Successfully', 200);
    }

}
