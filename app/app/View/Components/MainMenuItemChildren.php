<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainMenuItemChildren extends Component
{
    public $label;
    public $url;
    public $icon;
    public $active;
    public $count;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $url = null, $icon = 'bullet bullet-dot', $active = false, $count = null)
    {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
        $this->active = $active;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-menu-item-children', [
            'class' => $this->active ? 'menu-link active' : 'menu-link'
        ]);
    }
}
