<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ApplicantAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone'=>'required|unique:applicants,phone',
            'phone2'=>'sometimes|unique:applicants,phone2',
//            'p_seria'=>'required|string|max:2',
//            'p_number'=>'required|string|max:7',
            'p_pinfl'=>'sometimes|nullable|string|max:14',
//            'full_name'=>'required|string|max:50',
            'first_name'=>'required|string|max:50',
            'surname'=>'required|string|max:50',
            'family_name'=>'sometimes|nullable|string|max:50',
//            'sex'=>'required|in:man,woman,not selected',
            'age'=>'required|integer|min:17|max:100',
            'edu_lang_id'=>'required|exists:edu_langs,id',
            'edu_type'=>'required|in:bakalavr,magistr,ordinatura,doktorantura',
            'edu_form_id'=>'required|exists:edu_forms,id',
            'speciality_id'=>'required|exists:specialities,id',
            'application_type_id'=>'required|exists:application_types,id',
//            'payment_type_id'=>'required|exists:payment_types,id',
            'referrals_id'=>'sometimes|nullable|exists:referrals,id',
//            'payment_amount'=>,
//            'status'=>,
//            'status_test',
//            'study_year',
//            'studying_year',
//            'qungiroq',
//            'contract period',
        ];
    }

    public function afterValidated()
    {
        if($this->has('family_name')) {
            $this->merge([
                'full_name' => $this->first_name . ' ' . $this->surname . ' ' . $this->family_name,
            ]);
        }else{
            $this->merge([
                'full_name' => $this->first_name . ' ' . $this->surname,
            ]);
        }
        $this->merge([
            'sex'=>'not selected',
            'user_id'=>auth()->id(),
        ]);
        return $this->all();
    }
}
