<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:brands,slug'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'integer', 'in:0,1'],
            'is_featured' => ['nullable', 'integer', 'in:0,1'],
            'description' => ['nullable', 'string'],
            'mini_description' => ['nullable', 'string'],
            'founded_at' => ['nullable', 'integer', 'digits:4'], // Assuming 'founded_at' is a year field, with 4 digits
            'email' => ['nullable', 'email', 'string'],
            'phone' => ['nullable', 'string'], // You might want to add regex validation for phone numbers
            'website' => ['nullable', 'url'],
        ];
    }
}
