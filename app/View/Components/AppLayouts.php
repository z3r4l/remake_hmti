<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayouts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $page;
    
    public function __construct($title = null, $page = null)
    {
        $this->title = "HMTI UIS | $title" ?? "HMTI UIS";
        $this->page  = $page ?? "HMTI UIS";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('backend.layouts.index');
    }
}
