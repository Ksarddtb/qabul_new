<?php

namespace App\Models;

use App\Enums\EduTypesEnums;
use App\Enums\SexEnums;
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

    /**
     * @return BelongsTo
     */
    public function eduLang(): BelongsTo
    {
        return $this->belongsTo(eduLang::class,'edu_lang_id');
    }

    /**
     * @return BelongsTo
     */
    public function eduForm(): BelongsTo
    {
        return $this->belongsTo(eduForm::class,'edu_form_id');
    }

    /**
     * @return BelongsTo
     */
    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(ApplicationType::class,'application_type_id');
    }
    public function payment(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }
    public function referral(): BelongsTo
    {
        return $this->belongsTo(Referrals::class,'referrals_id');
    }

}
