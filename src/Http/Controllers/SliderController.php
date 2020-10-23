<?php

namespace Webzera\Slider\Http\Controllers;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){       
        return view('slider::index');
    }
}