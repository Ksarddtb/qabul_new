<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\UserRequest;
use App\Http\Requests\Api\Admin\UserUpdateRequest;
use App\Http\Resources\Api\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request):JsonResponse
    {
        DB::beginTransaction();
        try {
            User::create($request->validated());
            DB::commit();
            return response()->json(['message' => 'User created successfully']);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     * @param UserUpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, User $user):JsonResponse
    {
        DB::beginTransaction();
        try {
            $user->update($request->validated());
            DB::commit();
            return response()->json(['message' => 'User updated successfully']);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return response()->json(['message' => 'User deleted successfully']);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }
}
