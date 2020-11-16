<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
    */
    public function login(Request $request)
    {
      // validation of incoming request
      $this->validate($request, [
        'email' => 'required|string',
        'password' => 'required|string',
      ]);

      $credentials = $request->only(['email', 'password']);

      if (!$token = Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
      return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
      auth()->logout();

      return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
      return $this->respondWithToken(auth()->refresh());
    }
}