<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Speciality;
use Illuminate\Support\Facades\Cache;

class DepartmentObserver
{
    /**
     * Handle the Department "created" event.
     */
    public function created(Department $department): void
    {
        Cache::delete('departments');
        Cache::rememberForever('departments', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Department "updated" event.
     */
    public function updated(Department $department): void
    {
        Cache::delete('departments');
        Cache::rememberForever('departments', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Department "deleted" event.
     */
    public function deleted(Department $department): void
    {
        Cache::delete('departments');
        Cache::rememberForever('departments', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Department "restored" event.
     */
    public function restored(Department $department): void
    {
        Cache::delete('departments');
        Cache::rememberForever('departments', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Department "force deleted" event.
     */
    public function forceDeleted(Department $department): void
    {
        Cache::delete('departments');
        Cache::rememberForever('departments', function () {
            return Speciality::all();
        });
    }
}
