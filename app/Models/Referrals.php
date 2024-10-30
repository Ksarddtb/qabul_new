<?php

namespace App\Models;

use App\Observers\ReferralsObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(ReferralsObserver::class)]
class Referrals extends Model
{
    protected $fillable=[
        'name',
        'count',
    ];
    public $timestamps=false;

}
