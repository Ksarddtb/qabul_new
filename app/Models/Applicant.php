<?php

namespace App\Models;

use App\Enums\EduTypesEnums;
use App\Enums\SexEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{

    protected $fillable = [
        'user_id',
        'phone',
        'phone2',
        'p_series',
        'p_number',
        'p_pinfl',
        'full_name',
        'first_name',
        'surname',
        'family_name',
        'gender',
        'age',
        'edu_lang_id',
        'edu_type',
        'edu_form_id',
        'speciality_id',
        'application_type_id',
        'payment_type_id',
        'referrals_id',
        'payment_amount',
        'status',
        'status_test',
        'study_year',
        'studying_year',
        'qungiroq',
        'contract_period',
    ];
    protected $casts=[
        'edu_type'=>EduTypesEnums::class,
        'sex'=>SexEnums::class,
        'status'=>'boolean',
        'status_test'=>'boolean'
    ];
    public function edulang(): BelongsTo
    {
        return $this->belongsTo(eduLang::class);
    }

}
