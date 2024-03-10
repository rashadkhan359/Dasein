<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $sliders = Slider::where('visibility', 1)->orderBy('position', 'asc')->get();
        return view('dashboard', compact('sliders'));
    }


    public function authIndex(){
        $sliders = Slider::where('visibility', 1)->orderBy('position', 'asc')->get();
        return view('dashboard', compact('sliders'));
    }
}
