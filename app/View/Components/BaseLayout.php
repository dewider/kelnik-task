<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BaseLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('layouts.base');
    }
}