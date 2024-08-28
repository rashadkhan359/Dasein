<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'store_id',
        'status',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }


}
