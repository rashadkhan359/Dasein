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
        'brand_id',
        'short_description',
        'long_description',
        'sku',
        'product_type',
        'tags',
        'is_custom',
        'manufacturer',
        'status',
        'is_approved',
        'visibility',
        'allow_backorder',
        'publish_date',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'publish_date' => 'datetime',
        'updated_at' => 'datetime',
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
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function galleries(){
        return $this->hasMany(ProductVariantGallery::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function getFormattedPublishDateAttribute(){
        return $this->publish_date?->format('j F, Y');
    }
    public function getFormattedCreatedAtAttribute(){
        return $this->created_at->format('j F, Y');
    }

    public function getImageUrlAttribute(){
        if(Str::startsWith($this->image, ['http', 'https'])){
            return $this->image;
        }

        return asset("storage/{$this->image}");
    }
}
