<?php

namespace App\Http\Controllers\Api\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Global\AnnotationStoreRequest;
use App\Http\Resources\Api\Global\AnnotationResource;
use App\Models\Annotation;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AnnotationResource::collection(Annotation::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnotationStoreRequest $request)
    {
        Annotation::create($request->withValidator());
        return response()->json(['message'=>'annotation create successful'], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
