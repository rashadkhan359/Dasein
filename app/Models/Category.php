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

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }

}
