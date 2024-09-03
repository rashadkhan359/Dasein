<?php

namespace App\Http\Controllers\Backend\Api;
use App\Models\Tag;

class TagController{
    public function index()
    {
        $tags = Tag::all(['id', 'name']);
        return response()->json($tags);
    }
}
