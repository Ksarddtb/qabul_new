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
            'gender'=>$this->sex->translate(),
            'age'=>$this->age,
            'edu_lang_id'=>[
                'id'=>$this->edu_lang_id,
                'name'=>$this->edulang->name,
            ],
            'edu_type'=>$this->edu_type->value,
            'edu_form_id'=>[
                'id'=>$this->edu_form_id,
                'name'=>$this->eduForm->name,
            ],
            'speciality_id'=>[
                'id'=>$this->speciality_id,
                'name'=>$this->speciality->name,
                ],
            'application_type_id'=>[
                'id'=>$this->application_type_id,
                'name'=>$this->type->name,
                ],
            'payment_type_id'=>$this->payment_type_id!=null
                ? [
                    'id'=>$this->payment_type_id,
                    'name'=>$this->payment->name,
                ]
                : null ,
            'referrals_id'=>$this->referrals_id!=null
                    ? [
                        'id'=>$this->referrals_id,
                        'name'=>$this->referral->name
                    ]
                : null,
            'payment_amount'=>$this->payment_amount!=null
                ? number_format($this->payment_amount,2)
            : null,
            'status'=>$this->status,
            'status_test'=>$this->status_test,
            'study_year'=>$this->study_year,
            'studying_year'=>$this->studying_year,
            'qungiroq'=>$this->qungiroq,
            'contract_period'=>$this->contract_period,
        ];
    }
}
