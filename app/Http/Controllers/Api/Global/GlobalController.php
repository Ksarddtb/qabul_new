<?php

namespace App\Http\Controllers\Api\Global;

use App\Enums\EduTypesEnums;
use App\Enums\SexEnums;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Global\DepartmentResource;
use App\Http\Resources\Api\Global\SpecialityResource;
use App\Models\ApplicationType;
use App\Models\Department;
use App\Models\eduForm;
use App\Models\eduLang;
use App\Models\Speciality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class GlobalController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function departments()
    {
        $departments=Cache::rememberForever('departments',function(){
            return Department::all();
        });
        return DepartmentResource::collection($departments);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function speciality()
    {
        $specialities=Cache::rememberForever('specialities',function(){
            return Speciality::all();
        });
        return SpecialityResource::collection($specialities);
    }

    /**
     * @return JsonResponse
     */
    public function sex(){

        $sex=Cache::rememberForever('sex',function(){
            return SexEnums::cases();
        });
        return response()->json($sex);
    }

    /**
     * @return JsonResponse
     */
    public function eduTypes(){
        $edu_types=Cache::rememberForever('edu_types',function(){
            return EduTypesEnums::cases();
        });
        return response()->json($edu_types);
    }

    public function eduLangs()
    {
        return response()->json(Cache::rememberForever('edu_langs', function () {
            return eduLang::all();
        }));
    }

    /**
     * @return JsonResponse
     */
    public function eduForms(){
        return response()->json(Cache::rememberForever('edu_forms', function () {
            return eduForm::all();
        }));
    }

    /**
     * @return JsonResponse
     */
    public function appTypes(){

        return response()->json(Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        }));
    }
}
