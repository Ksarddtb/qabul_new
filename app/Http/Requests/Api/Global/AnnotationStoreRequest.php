<?php

namespace App\Http\Requests\Api\Global;

use Illuminate\Foundation\Http\FormRequest;

class AnnotationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create annotation');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|string',
        ];
    }

    public function withValidator(): array
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
        return $this->all();
    }
}
