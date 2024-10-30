<?php

namespace App\Models;

use App\Observers\PaymentTypesObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(PaymentTypesObserver::class)]
class PaymentType extends Model
{

    protected $fillable=[
        'name',
    ];
    public $timestamps=false;
}
