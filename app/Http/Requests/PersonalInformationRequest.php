<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PersonalInformationRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'username' => ['nullable', 'string', 'max:50'],
            'phone' => ['nullable', 'string', 'max:13'],
            'website' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'designation' => ['nullable', 'string'],
            'avatar' => ['nullable', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ];
    }
}
