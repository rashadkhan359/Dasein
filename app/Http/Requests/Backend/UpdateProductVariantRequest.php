<?php

namespace App\Http\Requests\Backend;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductVariantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role == Role::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'video_link' => ['nullable', 'string'],
            'images' => ['nullable', 'string'],
            'price' => ['nullable'],
            'offer_price' => ['nullable'],
            'offer_start_date' => ['nullable'],
            'offer_end_date' => ['nullable'],
            'stock_qty' => ['nullable', 'integer'],
            'tags' => ['nullable', 'string'],
            'attribute' => ['nullable', 'array'],
            'attribute.*' => ['nullable', 'string'],
            'value' => ['nullable', 'array'],
            'value.*' => ['nullable', 'string'],
        ];
    }
}
