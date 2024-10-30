<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id'=>$this->user_id,
            'phone'=>$this->phone,
            'phone2'=>$this->phone2,
            'p_series'=>$this->p_series,
            'p_number'=>$this->p_number,
            'p_pinfl'=>$this->p_pinfl,
            'full_name'=>$this->full_name,
            'first_name'=>$this->first_name,
            'surname'=>$this->surname,
            'family_name'=>$this->family_name,
            'gender'=>$this->gender,
            'age'=>$this->age,
            'edu_lang_id'=>$this->edu_lang_id,
            'edu_type'=>$this->edu_type->value,
            'edu_form_id'=>$this->edu_form_id,
            'speciality_id'=>$this->speciality_id,
            'application_type_id'=>$this->application_type_id,
            'payment_type_id'=>$this->payment_type_id,
            'referrals_id'=>$this->referrals_id,
            'payment_amount'=>$this->payment_amount,
            'status'=>$this->status,
            'status_test'=>$this->status_test,
            'study_year'=>$this->study_year,
            'studying_year'=>$this->studying_year,
            'qungiroq'=>$this->qungiroq,
            'contract_period'=>$this->contract_period,
        ];
    }
}
