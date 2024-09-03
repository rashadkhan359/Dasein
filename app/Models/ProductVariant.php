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
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'variant_tag');
    }

    public function galleries(){
        return $this->hasMany(ProductVariantGallery::class);
    }

    public function attributes(){
        return $this->hasMany(ProductVariantAttribute::class);
    }
}
