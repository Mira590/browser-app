<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Slider;

class WelcomeController extends Controller
{
    public function index(){
            $link = Link::all();
         $sliders = Slider::latest()->get();
         return view('link.welcome', compact('link', 'sliders'));
    }
}
