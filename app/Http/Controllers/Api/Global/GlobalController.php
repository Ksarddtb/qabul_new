<?php

namespace App\Http\Controllers\Api\Global;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Global\DepartmentResource;
use App\Http\Resources\Api\Global\SpecialityResource;
use App\Models\Department;
use App\Models\Speciality;
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
}
