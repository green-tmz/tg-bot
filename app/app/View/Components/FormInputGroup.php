<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInputGroup extends Component
{
    public $template;
    public $input;
    public $label;
    public $required;
    public $logo;
    public $error;
    public $id;
    public $horizontal;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($input = null, $label = null, $logo=null, $required = null, $error = null, $id = null, $template = null, $horizontal = null, $description = null)
    {
        $this->input = $input;
        $this->label = $label;
        $this->logo = $logo;
        $this->required = $required;
        $this->error = $error;
        $this->id = $id;

        if ($template !== null) {
            $this->template = $template;
        }

        $this->horizontal = $horizontal;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $template = $this->template ?? 'components.form-input-group';

        if ($this->horizontal) {
            $template .= '-horizontal';
        }

        return view($template);
    }
}
