<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
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
     * Get all posts
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(Post::all());
    }

    /**
     * Get specific post data
     * @var int post id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(Post::find($id));
    }

    /**
     * Insert a new post
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $post = Post::create($request->all());

      return response()->json($post, 201);
    }

    /**
     * Update a specific post
     * @var Request
     * @var int post id
     * 
     * @return string JSON encoded return value
     */
    public function update(Request $request, $id)
    {
      $post = Post::findOrFail($id);
      $post->update($request->all());

      return response()->json($post, 200);
    }

    /**
     * Delete a specific post
     * @var int post id
     * 
     * @return string JSON encoded return value
     */
    public function delete($id)
    {
      Post::findOrFail($id)->delete();
        return response('Post deleted Successfully', 200);
    }

}
