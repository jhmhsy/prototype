<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SwiperGallery extends Component
{
    public $images;

    public function __construct($images)
    {
        $this->images = $images;
    }

    public function render()
    {
        return view('components.swiper-gallery');
    }
}