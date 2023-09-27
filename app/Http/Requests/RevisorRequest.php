<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevisorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'coverLetter' => "required|min:20"
        ];
    }

    public function messages(): array
    {
        return [
            'coverLetter.required' => "La cover letter è obbligatoria",
            'coverLetter.min' => "La cover letter deve essere di almeno 20 caratteri"
        ];
    }
}
