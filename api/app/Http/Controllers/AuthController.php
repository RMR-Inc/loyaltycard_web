<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if(! $token = auth()->attempt($credentials)) {
            return $this->respondUnsuccessfully('Unauthorized !');
        }

        return $this->respondSuccessfullyWithResult('Valid user !', [
            'token' => $token,
            'type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255|min:5|unique:users',
            'password' => 'required|string|min:7|max:255',
        ]);

        if($validator->fails()) return $this->respondUnsuccessfully('Invalid parameters ! Validator Fail');

        $user = User::create(array_merge($validator->validate(), ['password' => bcrypt($request->password)]));
        if($user) return $this->respondSuccessfullyWithResult('Member created !', $user);
    }

    /**
     * Get the authenticated Member.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->respondSuccessfullyWithResult('Valid user !', Auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return $this->respondSuccessfully('Member logout !');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondSuccessfullyWithResult('Token regenerated !', [
            'token' => Auth::refresh(),
            'type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccessfullyWithResult($message, $result)
    {
        return response()->json([
            'success' => true,
            'details' => $message,
            'result' => $result,
        ], 201);
    }

    protected function respondSuccessfully($message)
    {
        return response()->json([
            'success' => true,
            'details' => $message,
        ], 200);
    }

    protected function respondUnsuccessfully($message)
    {
        return response()->json([
            'success' => false,
            'details' => $message,
        ], 400);
    }
}
