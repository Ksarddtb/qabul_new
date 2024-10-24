<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\ProfileResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    /**
     *      @OA\Info(
     *      version="1.0.0",
     *      title="My API",
     *      description="API Documentation",
     *      @OA\Contact(
     *          email="support@myapi.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     *  )
     *
     *     @OA\Post(
     *     path="/api/v1/login",
     *     tags={"Auth"},
     *     summary="Authenticate user and generate token",
     *     @OA\Parameter(
     *         name="login",
     *         in="query",
     *         description="User's login",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */

    public function login(LoginRequest $request): JsonResponse
    {

        if (Auth::attempt($request->only('login', 'password'))) {
            $user=Cache::rememberForever('user-'.auth()->id(),function() {
                return auth()->user();
            });
//            dd($check_user);
            $token = $user->createToken('token-name', [$request['login'], 'auth'])->plainTextToken;

            return response()->json([
                'user_name' => $user->name,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    /**
     *
     *     @OA\Get(
     *     path="/api/v1/profile",
     *     summary="Get user profile",
     *     description="Retrieve the user profile by authentication token",
     *     operationId="getUserProfile",
     *     tags={"Profile"},
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     */
    public function profile()
    {
        $user=Cache::rememberForever('user-'.auth()->id(),function() {
            return auth()->user();
        });
        return new ProfileResource($user);
    }
}
