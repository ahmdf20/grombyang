<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbDashboard extends Component
{
    protected $breadcrumbs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->breadcrumbs = array_slice(explode('/', request()->url()), 3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb-dashboard', [
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }
}
