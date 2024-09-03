<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $location;

    protected $fillable = [
        'mini_title',
        'main_title',
        'sub_title',
        'image',
        'banner',
        'button_url',
        'button_color',
        'position',
        'visibility',
        'schedule_publish',
        'status',
    ];

    protected $casts = [
        'schedule_publish' => 'datetime',
    ];

    public function getImageUrlAttribute(){
        if(Str::startsWith($this->image, ['http', 'https'])){
            return $this->image;
        }

        return asset("storage/{$this->image}");
    }
}
