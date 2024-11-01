<?php

namespace App\Models;

use App\Observers\EduFormObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
#[ObservedBy(eduFormObserver::class)]
class eduForm extends Model
{
    protected $fillable=[
        'name',
    ];
    public $timestamps=false;
}
