<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string:255',
            'subject_id' => 'required|integer|exists:subjects,id,deleted_at,NULL',
            'teacher_category_id' => 'required|integer|exists:teacher_categories,id,deleted_at,NULL',
        ];
    }
}
