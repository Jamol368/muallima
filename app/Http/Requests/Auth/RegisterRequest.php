<?php

namespace App\Http\Requests\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use PasswordValidationRules;

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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\+\d{12}$/', 'unique:users'],
            'type' => ['required', 'integer'],
            'teacher_category' => ['required_if:type,1', 'integer'],
            'subject' => ['required_if:type,1', 'integer'],
            'school' => ['required_if:type,2', 'integer'],
            'pupil_grade' => ['required_if:type,2', 'integer'],
            'province' => ['required', 'integer'],
            'town' => ['required', 'integer'],
            'password' => $this->passwordRules(),
        ];
    }
}
