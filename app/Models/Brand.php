<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'is_featured',
        'founded_at',
        'mini_description',
        'email',
        'phone',
        'website',
    ];
}
