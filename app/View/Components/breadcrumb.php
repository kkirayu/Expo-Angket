<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $sub,$icon,$subsub;
    public function __construct($sub,$icon,$subsub)
    {
        $this->sub = $sub;
        $this->icon = $icon;
        $this->subsub = $subsub;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
