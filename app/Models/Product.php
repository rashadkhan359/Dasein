<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'vendor_id',
        'store_id',
        'category_id',
        'sub_category_id',
        'stock_qty',
        'brand_id',
        'short_description',
        'long_description',
        'video_link',
        'sku',
        'price',
        'offer_price',
        'offer_start_date',
        'offer_end_date',
        'product_type',
        'tags',
        'manufacturer',
        'status',
        'is_approved',
        'visibility',
        'allow_backorder',
        'publish_date',
        'seo_title',
        'seo_description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->sku = uniqid();
            $product->slug = self::generateUniqueSlug($product->name);
        });
    }

    private static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function productGalleries(){
        return $this->hasMany(ProductGallery::class);
    }

    public function productAttributes(){
        return $this->hasMany(ProductAttribute::class);
    }
}
