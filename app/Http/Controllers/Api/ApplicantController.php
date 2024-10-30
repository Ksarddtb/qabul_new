<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApplicantRequest;
use App\Http\Resources\Api\ApplicantResource;
use App\Models\Applicant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApplicantResource::collection(Applicant::all());
    }

    public function phoneValidation(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:applicants,phone',
            'phone2' => 'sometimes|unique:applicants,phone2'
        ]);
        return response()->json([
            'success' => true,
            'message' => $request->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param ApplicantRequest $request
     * @return JsonResponse
     */
    public function store(ApplicantRequest $request)
    {
//        dd($request->afterValidated());
        DB::beginTransaction();
        try {
            Applicant::create($request->afterValidated());
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Applicant created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
