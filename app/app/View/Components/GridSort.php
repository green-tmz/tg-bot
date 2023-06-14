<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GridSort extends Component
{
    public $value;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $label)
    {
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grid-sort');
    }
}