<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ZoomImage extends Component
{
    public $imgSrc;
    public $caption;
    public function __construct($imgSrc, $caption)
    {
        $this->imgSrc = $imgSrc;
        $this->caption = $caption;
    }
    public function render(): View|Closure|string
    {
        return view('components.zoom-image');
    }
}
