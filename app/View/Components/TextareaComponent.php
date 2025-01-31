<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextareaComponent extends Component
{
    public $data;
    public $column;
    public $name;
    public $id;
    public $class;
    public $label;
    public $placeholder;
    public $value;
    public $cols;
    public $rows;
    public function __construct($data=[], $column=null, $label = null, $name=null, $id = null, $class = null, $placeholder = null,$value=null,$cols=null,$rows=null)
    {
        $this->data = $data;        
        $this->column = $column;
        $this->label = $label;
        $this->name = $name;       
        $this->id = $id;
        $this->class = $class;        
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->cols = $cols;
        $this->rows = $rows;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea-component');
    }
}
