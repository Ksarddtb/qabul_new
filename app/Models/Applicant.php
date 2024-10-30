<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{

    protected $fillable = [
        'user_id',
        'phone',
        'phone2',
        'p_series',
        'p_number',
        'p_pinfl',
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
}
