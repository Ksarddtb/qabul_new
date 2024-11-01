<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Admin\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleResource::collection(Role::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        Role::create(['name' => $request->name]);
        return response()->json(['message' => 'Role created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role->update(['name' => $request->name]);
        return response()->json(['message' => 'Role updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): JsonResponse
    {
        try {
            DB::table('roles')->where('id', $role->id)->delete();
            return response()->json(['message' => 'Role deleted successfully.']);
        } catch (\Exception $e) {
            // Логирование ошибки
            \Log::error('Error deleting role: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete role.'], 500);
        }
    }
}
