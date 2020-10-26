<?php

namespace  Webzera\Slider\Http\Livewire;

use Livewire\Component;

class LSlider extends Component
{
    public function render()
    {
        return view('admin::livewire.l-slider', ['title' => 'Show Posts'])
        ->layout('admin::layouts.app')
        // ->extends('admin::layouts.app')
        // ->section('body');
        // ->slot('main')
        ;
    }
}
