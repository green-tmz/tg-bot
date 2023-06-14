<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public $label;
    public $url;
    public $icon;
    public $active;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $url = null, $icon = 'bullet bullet-dot', $active = false)
    {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-menu-item', [
            'class' => $this->active ? 'menu-link active' : 'menu-link'
        ]);
    }
}
