<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
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
     * Get all comments
     *
     * @return string JSON encoded return value
     */
    public function showAll()
    {
      return response()->json(Comment::all());
    }

    /**
     * Get specific comment data
     * @var int comment id
     * 
     * @return string JSON encoded return value
     */
    public function showOne($id)
    {
      return response()->json(Comment::find($id));
    }

    /**
     * Insert a new comment
     * @var Request
     * 
     * @return string JSON encoded return value
     */
    public function create(Request $request)
    {
      $comment = Comment::create($request->all());

      return response()->json($comment, 201);
    }

    /**
     * Update a specific comment
     * @var Request
     * @var int comment id
     * 
     * @return string JSON encoded return value
     */
    public function update(Request $request, $id)
    {
      $comment = Comment::findOrFail($id);
      $comment->update($request->all());

      return response()->json($comment, 200);
    }

    /**
     * Delete a specific comment
     * @var int comment id
     * 
     * @return string JSON encoded return value
     */
    public function delete($id)
    {
      Comment::findOrFail($id)->delete();
        return response('Comment deleted Successfully', 200);
    }

}
