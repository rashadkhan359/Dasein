<?php

namespace App\Http\Requests\Backend;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductVariantRequest extends FormRequest
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
            'product_id' => ['required', 'exists:products,id'],
            'video_link' => ['nullable', 'string'],
            'images' => ['nullable', 'string'],
            'price' => ['required'],
            'offer_price' => ['nullable'],
            'offer_start_date' => ['nullable'],
            'offer_end_date' => ['nullable'],
            'stock_qty' => ['required', 'integer'],
            'attribute' => ['nullable', 'array'],
            'attribute.*' => ['nullable', 'string'],
            'value' => ['nullable', 'array'],
            'value.*' => ['nullable', 'string'],
        ];
    }
}
