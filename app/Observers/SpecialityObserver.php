<?php

namespace App\Observers;

use App\Models\Speciality;
use Illuminate\Support\Facades\Cache;

class SpecialityObserver
{
    /**
     * Handle the Speciality "created" event.
     */
    public function created(Speciality $speciality): void
    {
        Cache::delete('specialities');
        Cache::rememberForever('specialities', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Speciality "updated" event.
     */
    public function updated(Speciality $speciality): void
    {
        Cache::delete('specialities');
        Cache::rememberForever('specialities', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Speciality "deleted" event.
     */
    public function deleted(Speciality $speciality): void
    {
        Cache::delete('specialities');
        Cache::rememberForever('specialities', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Speciality "restored" event.
     */
    public function restored(Speciality $speciality): void
    {
        Cache::delete('specialities');
        Cache::rememberForever('specialities', function () {
            return Speciality::all();
        });
    }

    /**
     * Handle the Speciality "force deleted" event.
     */
    public function forceDeleted(Speciality $speciality): void
    {
        Cache::delete('specialities');
        Cache::rememberForever('specialities', function () {
            return Speciality::all();
        });
    }
}
