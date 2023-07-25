<?php

namespace App\Admin\View\Components\Input;

class InputDate extends Input
{
    public $parentID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parentID, $type = 'text', $required = false)
    {
        //
        $this->required = $required;
        $this->type = $type;
        $this->parentID = $parentID;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.date');
    }
}
