<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class inputComponent extends Component
{
    public $data;
    public $column;
    public $type;
    public $name;
    public $id;
    public $class;
    public $label;
    public $placeholder;
    public $value;
    public $errorMsg;
    public $maxlength;
    public $readonly;

    public function __construct($data=[], $column=null,$type=null, $label = null, $name=null, $id = null, $class = null, $placeholder = null,$value=null,$errorMsg=null,$maxlength=null,$readonly=null)
    {

        // pre($readonly);exit;
        $this->data = $data;        
        $this->column = $column;
        $this->type = $type;
        $this->label = $label;
        $this->name = $name;       
        $this->id = $id;
        $this->class = $class;        
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->errorMsg = $errorMsg;
        $this->maxlength = $maxlength;
        $this->readonly = $readonly;
    }
    public function render()
    {
        // $data['value'] = $this->value;
        // pre($data['value']);exit;
        return view('components.admin.input-component');
    }
}
