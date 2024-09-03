<?php

namespace App\Http\Requests\Backend;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === Role::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:1024'],
            'vendor_id' => ['nullable'],
            'store' => ['required', 'exists:stores,id'],
            'category' => ['required', 'exists:categories,id'],
            'sub_category' => ['required', 'exists:sub_categories,id'],
            'brand' => ['nullable', 'exists:brands,id'],
            'short_description' => ['nullable', 'string', 'max:1024'],
            'long_description' => ['nullable', 'string'],
            'product_type' => [],
            'tags' => ['nullable', 'string'],
            'manufacturer' => ['nullable'],
            'status' => ['required'],
            'visibility' => ['required'],
            'allow_backorder' => ['nullable'],
            'publish_date' => ['nullable'],
            'seo_title' => ['nullable'],
            'seo_description' => ['nullable'],
        ];
    }
}
