<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
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
     * Get all tags
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(Tag::all());
    }

    /**
     * Get specific tag data
     * @var int tag id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(Tag::find($id));
    }

    /**
     * Insert a new tag
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $tag = Tag::create($request->all());

      return response()->json($Tag, 201);
    }

    /**
     * Update a specific tag
     * @var Request
     * @var int tag id
     * 
     * @return string JSON encoded return value
     */
    public function update(Request $request, $id)
    {
      $tag = Tag::findOrFail($id);
      $tag->update($request->all());

      return response()->json($Tag, 200);
    }

    /**
     * Delete a specific tag
     * @var int tag id
     * 
     * @return string JSON encoded return value
     */
    public function delete($id)
    {
      Tag::findOrFail($id)->delete();
        return response('Tag deleted Successfully', 200);
    }

}
