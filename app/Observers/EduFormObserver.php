<?php

namespace App\Observers;

use App\Models\eduForm;
use Illuminate\Support\Facades\Cache;

class EduFormObserver
{
    /**
     * Handle the eduForm "created" event.
     */
    public function created(eduForm $eduForm): void
    {
        Cache::delete('edu_forms');
        Cache::rememberForever('edu_forms', function () {
            return eduForm::all();
        });
    }

    /**
     * Handle the eduForm "updated" event.
     */
    public function updated(eduForm $eduForm): void
    {
        Cache::delete('edu_forms');
        Cache::rememberForever('edu_forms', function () {
            return eduForm::all();
        });
    }

    /**
     * Handle the eduForm "deleted" event.
     */
    public function deleted(eduForm $eduForm): void
    {
        Cache::delete('edu_forms');
        Cache::rememberForever('edu_forms', function () {
            return eduForm::all();
        });
    }

    /**
     * Handle the eduForm "restored" event.
     */
    public function restored(eduForm $eduForm): void
    {
        //
    }

    /**
     * Handle the eduForm "force deleted" event.
     */
    public function forceDeleted(eduForm $eduForm): void
    {
        //
    }
}
