<?php

namespace App\Models;

use App\Observers\EduLangObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy([EduLangObserver::class])]
class eduLang extends Model
{
    protected $fillable=[
        'name',
    ];
    public $timestamps=false;
}
