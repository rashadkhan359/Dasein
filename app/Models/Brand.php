<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function getImageUrlAttribute(){
        if(Str::startsWith($this->image, ['http', 'https'])){
            return $this->image;
        }

        return asset("storage/{$this->image}");
    }
}
