<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'product_id',
        'image_path',
        'caption',
    ];

    public function productVariant(){
        return $this->belongsTo(ProductVariant::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute(){
        return asset("storage/{$this->image_path}");
    }
}
