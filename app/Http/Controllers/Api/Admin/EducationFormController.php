<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\EduFormRequest;
use App\Http\Resources\Api\Admin\EduFormResource;
use App\Models\eduForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EducationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EduFormResource::collection(eduForm::paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     * @param EduFormRequest $request
     * @return JsonResponse
     */
    public function store(EduFormRequest $request)
    {
        DB::beginTransaction();
        try {
            eduForm::create($request->validated());
            return response()->json(['message' => 'User created successfully'],Response::HTTP_CREATED);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(eduForm $eduForm)
    {
        return new EduFormResource($eduForm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EduFormRequest $request, eduForm $eduForm)
    {
        DB::beginTransaction();
        try {
            $eduForm->update($request->validated());
            return response()->json(['message' => 'User updated successfully'],Response::HTTP_OK);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eduForm $eduForm)
    {
        DB::beginTransaction();
        try {
            $eduForm->delete();
            return response()->json(['message' => 'User deleted successfully'],Response::HTTP_OK);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }
}
