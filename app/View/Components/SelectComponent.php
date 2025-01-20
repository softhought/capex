<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectComponent extends Component
{
    public $data;
    public $column;
    public $name;
    public $id;
    public $class;
    public $label;
    public $arraykey;
    public $arrayValue;
    public $value;
    public $multiple;
    public $placeholder;
    public function __construct($data=[], $column=null, $name=null, $id = null, $class = null, $label = null, $arraykey = null,$arrayValue = null,$value=null, $multiple=null,$placeholder=null)
    {
        $this->data = $data;
        $this->column = $column;
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->label = $label;
        $this->arrayValue = $arrayValue;
        $this->arraykey = $arraykey;
        $this->value = $value;
        $this->multiple = $multiple;
        $this->placeholder = $placeholder;
        //  pre($this->value) ;exit;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    { $result['data'] = $this->data;
        return view('components.select-component',$result);
    }
}
