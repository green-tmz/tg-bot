<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GridDeleteButton extends Component
{
    public $href;
    public $dataTargetId;
    public $deletedMessage;
    public $confirmationMessage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $dataTargetId, $deletedMessage = null, $confirmationMessage = null)
    {
        $this->href = $href;
        $this->dataTargetId = $dataTargetId;
        $this->deletedMessage = $deletedMessage;
        $this->confirmationMessage = $confirmationMessage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grid-delete-button');
    }
}
