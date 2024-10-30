<?php

namespace App\Observers;

use App\Models\eduLang;
use Illuminate\Support\Facades\Cache;

class EduLangObserver
{
    /**
     * Handle the eduLang "created" event.
     */
    public function created(eduLang $eduLang): void
    {
        Cache::delete('edu_langs');
        Cache::rememberForever('edu_langs', function () {
            return eduLang::all();
        });
    }

    /**
     * Handle the eduLang "updated" event.
     */
    public function updated(eduLang $eduLang): void
    {
        Cache::delete('edu_langs');
        Cache::rememberForever('edu_langs', function () {
            return eduLang::all();
        });
    }

    /**
     * Handle the eduLang "deleted" event.
     */
    public function deleted(eduLang $eduLang): void
    {
        Cache::delete('edu_langs');
        Cache::rememberForever('edu_langs', function () {
            return eduLang::all();
        });
    }

    /**
     * Handle the eduLang "restored" event.
     */
    public function restored(eduLang $eduLang): void
    {
        //
    }

    /**
     * Handle the eduLang "force deleted" event.
     */
    public function forceDeleted(eduLang $eduLang): void
    {
        //
    }
}
