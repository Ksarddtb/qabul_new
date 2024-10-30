<?php

namespace App\Observers;

use App\Models\ApplicationType;
use Illuminate\Support\Facades\Cache;

class AppTypesObserver
{
    /**
     * Handle the ApplicationType "created" event.
     */
    public function created(ApplicationType $applicationType): void
    {
        Cache::delete('app_types');
        Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        });
    }

    /**
     * Handle the ApplicationType "updated" event.
     */
    public function updated(ApplicationType $applicationType): void
    {
        Cache::delete('app_types');
        Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        });
    }

    /**
     * Handle the ApplicationType "deleted" event.
     */
    public function deleted(ApplicationType $applicationType): void
    {
        Cache::delete('app_types');
        Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        });
    }

    /**
     * Handle the ApplicationType "restored" event.
     */
    public function restored(ApplicationType $applicationType): void
    {
        Cache::delete('app_types');
        Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        });
    }

    /**
     * Handle the ApplicationType "force deleted" event.
     */
    public function forceDeleted(ApplicationType $applicationType): void
    {
        Cache::delete('app_types');
        Cache::rememberForever('app_types', function () {
            return ApplicationType::all();
        });
    }
}
