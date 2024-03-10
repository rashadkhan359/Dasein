<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $location;

    protected $fillable = [
        'mini_title',
        'main_title',
        'sub_title',
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

}
