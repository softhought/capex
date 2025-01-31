<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class ModalLayout extends Component
{
    public $id;
    public $title;
    public $dialogclass;
    public $bodyclass;
    public function __construct($id,$title,$dialogclass,$bodyclass)
    {
        $this->id= $id;
        $this->title= $title;
        $this->dialogclass= $dialogclass;
        $this->bodyclass= $bodyclass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal-layout');
    }
}
