<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\EduLangRequest;
use App\Http\Resources\Api\Admin\EduLangResource;
use App\Models\eduLang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EducationLangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EduLangResource::collection(eduLang::paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EduLangRequest $request)
    {
        DB::beginTransaction();
        try {
            eduLang::create($request->validated());
            return response()->json(['message' => 'User created successfully'],Response::HTTP_CREATED);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(eduLang $eduLang)
    {
        return eduLangResource::make($eduLang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EduLangRequest $request, eduLang $eduLang)
    {
        DB::beginTransaction();
        try {
            $eduLang->update($request->validated());
            return response()->json(['message' => 'User updated successfully'],Response::HTTP_OK);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eduLang $eduLang)
    {
        DB::beginTransaction();
        try {
            $eduLang->delete();
            return response()->json(['message' => 'User deleted successfully'],Response::HTTP_OK);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }
}
