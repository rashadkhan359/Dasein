<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brandName' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'companyLogo' => asset('storage/' . $this->image),
            'status' => $this->status,
            'isFeatured' => $this->is_featured,
            'productItems' => 0,
        ];
    }
}
