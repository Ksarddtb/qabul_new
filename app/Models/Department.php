<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
