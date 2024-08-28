<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'video_link',
        'stock_qty',
        'price',
        'offer_price',
        'offer_start_date',
        'offer_end_date',
        'tags',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($productVariant) {
            $productVariant->sku = uniqid();
        });
    }


    public function productGalleries(){
        return $this->hasMany(ProductVariantGallery::class);
    }

    public function productAttributes(){
        return $this->hasMany(ProductVariantAttribute::class);
    }
}
