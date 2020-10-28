<?php

namespace  Webzera\Slider\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Webzera\Slider\Models\Slider;

class LSlider extends Component
{
    public $slider_name;
    public $caption;
    public $sub_caption;
    public $slider_image;
    public $link_url;

    public function resetInputField()
    {
        $this->slider_name = '';
        $this->caption = '';
        $this->sub_caption = '';
        $this->slider_image = '';
        $this->link_url = '';
    }
    public function store()
    {        
        $validateData = $this->validate([
            'slider_name' => 'required',
            'caption' => 'required',
            'sub_caption' => 'required',
            'slider_image' => 'required',
            'link_url' => 'required',            
        ]);

        Slider::create($validateData);
        Session()->flash('message', 'Slider add successfully');
        $this->resetInputField();
        $this->emit('sliderAdded');
    }

    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin::livewire.l-slider', ['sliders' => $sliders])
        ->layout('admin::layouts.app')
        // ->extends('admin::layouts.app')
        // ->section('body');
        // ->slot('main')
        ;
    }
}
