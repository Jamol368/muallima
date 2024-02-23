<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'province' => 'required|integer|exists:provinces,id',
            'town' => 'required|integer|exists:towns,id',
            'type' => 'required|integer|exists:user_types,id',

            'school' => 'integer|exists:schools,id',
            'pupil_grade' => 'integer|between:1,4',

            'teacher_category' => 'integer|exists:teacher_categories,id',
            'subject' => 'integer|exists:subjects,id',

            'university' => 'string|max:255',
            'university_grade' => 'integer|between:1,5',
        ];
    }
}
