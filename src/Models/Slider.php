<?php

namespace Webzera\Slider\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'slider_name',
        'caption',
        'sub_caption',
        'slider_image',
        'link_url',        
    ];    
}
