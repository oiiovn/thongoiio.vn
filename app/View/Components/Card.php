<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The class(es) to be added to the component.
     *
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $class
     * @return void
     */
    public function __construct($class = null)
    {
        $this->class = $class;
    }

    // Các phương thức khác của component...

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card', [
            'class' => $this->class,
        ]);
    }
}
