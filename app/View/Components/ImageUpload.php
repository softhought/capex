<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUpload extends Component
{
    public $id;
    public $label;
    public $imageSrc;
    public function __construct($id, $label, $imageSrc = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->imageSrc = $imageSrc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-upload');
    }
}
