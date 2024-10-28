<?php

namespace App\Models;

use App\Observers\DepartmentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[ObservedBy([DepartmentObserver::class])]
class Department extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'code',
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    /**
    * @return HasMany
    */
    function childrens(): HasMany
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function specialities(): HasMany
    {
        return $this->hasMany(Speciality::class);
    }
}
