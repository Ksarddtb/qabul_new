<?php

namespace App\Models;

use App\Observers\AppTypesObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(AppTypesObserver::class)]
class ApplicationType extends Model
{
    protected $fillable=[
        'name',
    ];
    public $timestamps=false;
}
