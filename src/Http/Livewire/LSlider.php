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

    public $slider_id;

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
    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();

        $this->slider_id = $slider->id;
        $this->slider_name = $slider->slider_name;
        $this->caption = $slider->caption;
        $this->sub_caption = $slider->sub_caption;
        $this->slider_image = $slider->slider_image;
        $this->link_url = $slider->link_url;
    }
    public function update()
    {
        $this->validate([
            'slider_name' => 'required',
            'caption' => 'required',
            'sub_caption' => 'required',
            'slider_image' => 'required',
            'link_url' => 'required',            
        ]);
        if($this->slider_id)
        {
            $slider = Slider::find($this->slider_id);
            $slider->update([
                'slider_name' => $this->slider_name,
                'caption' => $this->caption,
                'sub_caption' => $this->sub_caption,
                'slider_image' => $this->slider_image,
                'link_url' => $this->link_url,
            ]);
            Session()->flash('message', 'Slider updated successfully');
            $this->resetInputField();
            $this->emit('sliderUpdated');
        }
    }
    public function delete($id)
    {
        if($id)
        {
            Slider::where('id', $id)->delete();
            Session()->flash('message', 'Slider deleted successfully');

        }
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
