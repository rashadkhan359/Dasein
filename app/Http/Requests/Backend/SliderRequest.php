<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this->all());
        return [
            'mini_title' => ['nullable', 'string', 'max:255'],
            'main_title' => ['nullable', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:2048'],
            'image' => ['nullable', 'string', 'max:400'],
            'button_url' => ['nullable', 'url', 'max:400'],
            'button_color' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable'],
            'visibility' => ['nullable'],
            'schedule_publish' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'integer', 'max:255'],
        ];
    }
}
