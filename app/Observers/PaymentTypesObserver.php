<?php

namespace App\Observers;

use App\Models\PaymentType;
use Illuminate\Support\Facades\Cache;

class PaymentTypesObserver
{
    /**
     * Handle the PaymentType "created" event.
     */
    public function created(PaymentType $paymentType): void
    {
        //
    }

    /**
     * Handle the PaymentType "updated" event.
     */
    public function updated(PaymentType $paymentType): void
    {
        Cache::delete('payment_types');
        Cache::rememberForever('payment_types', function () {
            return PaymentType::all();
        });
    }

    /**
     * Handle the PaymentType "deleted" event.
     */
    public function deleted(PaymentType $paymentType): void
    {
        Cache::delete('payment_types');
        Cache::rememberForever('payment_types', function () {
            return PaymentType::all();
        });
    }

    /**
     * Handle the PaymentType "restored" event.
     */
    public function restored(PaymentType $paymentType): void
    {
        Cache::delete('payment_types');
        Cache::rememberForever('payment_types', function () {
            return PaymentType::all();
        });
    }

    /**
     * Handle the PaymentType "force deleted" event.
     */
    public function forceDeleted(PaymentType $paymentType): void
    {
        //
    }
}
