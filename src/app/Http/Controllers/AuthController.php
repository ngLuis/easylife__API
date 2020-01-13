<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:api', ['except' => ['login','register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
 /*        dd($credentials); */
        if (!$token = auth()->attempt($credentials)) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function register(Request $request){
        $inputData = array();

        $validation = $this->validateUser($request);

        if ( !$validation->fails() ) {
            User::create([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
                'type' => $request->input('type'),
                'dni' => $request->input('dni'),
            ]);

            $credentials = request(['email', 'password']);

            if (!$token = auth()->attempt($credentials)) {

                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);

        } else {
            return response()->json([
                'error' => 'Validation error',
                'code' => 403
            ], 403);
        }
    }

    private function validateUser($data) {
        return Validator::make($data->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
            'type' => 'required',
            'dni' => 'required|unique:users'
        ]);
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
    public function payload()
    {
        return response()->json(auth()->payload());
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
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }
}
