<?php

namespace App\Http\Controllers\Api\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Global\AnnotationStoreRequest;
use App\Http\Resources\Api\Global\AnnotationResource;
use App\Models\Annotation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class AnnotationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return AnnotationResource::collection(Annotation::get());
    }

    /**
     * Store a newly created resource in storage.
     * @param AnnotationStoreRequest $request
     * @return JsonResponse
     */
    public function store(AnnotationStoreRequest $request)
    {
        Annotation::create($request->withValidator());
        return response()->json([
            'success'=>true,
            'message'=>'annotation create successful'
        ],Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     * @param AnnotationStoreRequest $request
     * @param Annotation $annotation
     * @return JsonResponse
     */
    public function update(AnnotationStoreRequest $request, Annotation $annotation)
    {
        $annotation->update($request->withValidator());
        return response()->json([
            'success'=>true,
            'message'=>'annotation update successful',
        ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annotation $annotation)
    {
        $annotation->delete();
        return response()->json([
            'success'=>true,
            'message'=>'annotation delete successful',
        ],Response::HTTP_ACCEPTED);
    }
}
