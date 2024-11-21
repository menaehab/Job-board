<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorejobRequest extends FormRequest
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
            'job_name' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric|gt:salary_min',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
        ];
    }
}
