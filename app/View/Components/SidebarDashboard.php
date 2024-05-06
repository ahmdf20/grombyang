<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\SubMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarDashboard extends Component
{
    protected $sidebar_menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sidebar_menus = Menu::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-dashboard', [
            'menus' => $this->sidebar_menus,
        ]);
    }
}
