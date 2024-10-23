<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

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
//if (Auth::attempt($credentials))  {
////            $request->session()->regenerate();
//return $this->sendResponse([
//"name"=>auth()->user()->name,
//"phone"=>auth()->user()->phone,
//"email"=>auth()->user()->email,
//"role"=>auth()->user()->getRoleNames(),
//"token"=>auth()->user()->createToken('token-name', [$request['phone'], 'auth'])->plainTextToken,
//],
//'Success Auth'
//);
//}
}
