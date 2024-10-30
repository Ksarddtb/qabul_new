<?php

namespace App\Observers;

use App\Models\Referrals;
use Illuminate\Support\Facades\Cache;

class ReferralsObserver
{
    /**
     * Handle the Refferals "created" event.
     */
    public function created(Referrals $refferals): void
    {
        Cache::delete('referral_codes');
        Cache::rememberForever('referral_codes', function () {
            return Referrals::all();
        });
    }

    /**
     * Handle the Refferals "updated" event.
     */
    public function updated(Referrals $refferals): void
    {
        Cache::delete('referral_codes');
        Cache::rememberForever('referral_codes', function () {
            return Referrals::all();
        });
    }

    /**
     * Handle the Refferals "deleted" event.
     */
    public function deleted(Referrals $refferals): void
    {
        Cache::delete('referral_codes');
        Cache::rememberForever('referral_codes', function () {
            return Referrals::all();
        });
    }

    /**
     * Handle the Refferals "restored" event.
     */
    public function restored(Referrals $refferals): void
    {
        Cache::delete('referral_codes');
        Cache::rememberForever('referral_codes', function () {
            return Referrals::all();
        });
    }

    /**
     * Handle the Refferals "force deleted" event.
     */
    public function forceDeleted(Referrals $refferals): void
    {
        Cache::delete('referral_codes');
        Cache::rememberForever('referral_codes', function () {
            return Referrals::all();
        });
    }
}
